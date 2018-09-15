<?php

namespace App\Repositories;

use App\Contracts\Repositories\TagRepository;
use App\Models\Tag;

class TagRepositoryEloquent extends AbstractRepositoryEloquent implements TagRepository
{

    public function model()
    {
        return app(Tag::class);
    }

    public function all()
    {
        $tag = $this->model()
            ->latest()
            ->get();

        return $tag;
    }

    public function show($id)
    {
        return $this->findOrFail($id);
    }

    public function store(array $data)
    {
        $tag = $this->model()->create([
            'title' => $data['title'],
            'slug' => $data['slug'],
            'description' => $data['description'],
            'content' => $data['content'],
            'status' => $data['active'],
            'image' => $data['image'],
            'view' => $data['view'],
        ]);

        return $tag;
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($id, array $data)
    {
        $tag = $this->findOrFail($id)->update([
            'title' => $data['title'],
            'slug' => $data['slug'],
        ]);

        return $tag;
    }

    public function destroy($id)
    {
        $tag = $this->fincOrFail($id);

        return $tag->delete();
    }

    public function active($id)
    {
        $tag = $this->findOrFail($id)->update([
            'status' => config('blog.tag.active'),
        ]);

        return $tag;
    }

    public function inActive($id)
    {
        $tag = $this->findOrFail($id)->update([
            'status' => config('blog.tag.inactive'),
        ]);

        return $tag;
    }

    public function getTagHome()
    {
        $tags = $this->model()
            ->latest()
            ->take(config('blog.tag.limit'))
            ->get();

        return $tags;
    }

    public function getPostByTag($id)
    {
        $tag = $this->model()->findOrFail($id);
        $posts = $tag->posts;

        return $posts;
    }
}