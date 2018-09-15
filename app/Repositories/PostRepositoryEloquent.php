<?php

namespace App\Repositories;

use App\Contracts\Repositories\PostRepository;
use App\Models\Post;
use App\Models\Tag;
use DB;

class PostRepositoryEloquent extends AbstractRepositoryEloquent implements PostRepository
{

    public function model()
    {
        return app(Post::class);
    }

    public function all()
    {
        $posts = $this->model()
            ->latest()
            ->get();

        return $posts;
    }

    public function show($id)
    {
        $post = $this->model()->findOrFail($id);

        $tags = $post->tags;
        $tagsName = [];
        $view = $post->view;
        $post->update([
            'view' => $view + 1,
        ]);

        foreach ($tags as $tag) {
            $tagsName[] = array([
                'id' => $tag->id,
                'name' => $tag->name,
            ]);
        }

        $tagsName = array_slice($tagsName, 0, 2);

        $post->setAttribute('tags_name', $tagsName);

        return $post;
    }

    public function store(array $data)
    {
        $post = $this->model()->create([
            'user_id' => auth()->user()->id,
            'title' => $data['title'],
            'content' => $data['content'],
            'status' => config('blog.post.status.active'),
            'view' => Post::VIEW,
        ]);

        return $post;
    }

    public function edit($id)
    {
        return $this->model()->findOrFail($id);
    }

    public function update($id, array $data)
    {
        $post = $this->model()->findOrFail($id);

        return $post->update([
            'title' => $data['title'],
            'content' => $data['content'],
        ]);
    }

    public function destroy($id)
    {
        $post = $this->model()->findOrFail($id);

        return $post->delete();
    }

    public function active($id)
    {
        $post = $this->model()->findOrFail($id);

        $post->update([
            'status' => config('blog.post.status.active'),
        ]);
    }

    public function inActive($id, $data)
    {
        $post = $this->model()->findOrFail($id);

        $post->update([
            'status' => config('blog.post.status.inactive'),
            'reject_reason' => $data,
        ]);
    }

    public function pending($id)
    {
        $post = $this->model()->findOrFail($id)->update([
            'status' => config('blog.post.pending'),
        ]);

        return $post;
    }

    public function paginate()
    {
        $post = $this->model()
            ->latest()
            ->paginate(config('blog.post.paginate'));

        return $post;
    }

    public function getTags($id)
    {
        $tags = Tag::latest()
            ->take(config('blog.tag.limit'))
            ->get();

        return $tags;
    }
}