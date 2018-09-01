<?php

namespace App\Repositories;

use App\Contracts\Repositories\PostRepository;
use App\Models\Post;

class PostRepositoryEloquent extends AbstractRepositoryEloquent implements PostRepository
{

    public function model()
    {
        return app(Post::class);
    }

    public function getDataAll($dataSelect = ['*'])
    {
        $posts = $this->model()
            ->select($dataSelect)
            ->orderBy('created_at', 'DESC')
            ->get();

        return $posts;
    }

    public function getDataPost($id)
    {
        try {
            $post = $this->model()->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            throw new NotFoundException();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new UnknownException($e->getMessage(), $e->getCode());
        }

        return $post;
    }

    public function store(array $data)
    {
        return $this->model()->create([
            'title' => $data['title'],
            'slug' => $data['slug'],
            'description' => $data['description'],
            'content' => $data['content'],
            'active' => $data['active'],
            'image' => $data['image'],
            'view' => $data['view'],
        ]);
    }

    public function edit($id)
    {
        try {
            $post = $this->model()->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            throw new NotFoundException();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new UnknownException($e->getMessage(), $e->getCode());
        }
        return $post;
    }

    public function update(Post $post, array $data)
    {
        $slug = $this->createUrlSlug($data['title']);
        $path = $post->slide_url;
        if (isset($data['medias'])) {
            $path = $this->uploadFile($data['medias'][0]['file'], strtolower(class_basename($this->model())), 'image');
        }
        $post->update([
            'slide_url' => $path,
            'title' => $data['title'],
            'slug' => $slug,
            'content' => $data['content'],
            'public' => $data['public'],
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function destroy(Post $post)
    {
        $post->delete();
    }

    public function changePriority(Post $post, $dataSelect = ['*'])
    {
        if ($post->priority == 0) {
            $temp = $this->model()
                ->select('priority')
                ->orderBy('priority', 'DESC')
                ->first()->priority;
            $post->update([
                'priority' => $temp + 1,
                'public' => 1,
            ]);
        } else {
            $posts = $this->model()
                ->select($dataSelect)
                ->where('priority', '>', $post->priority)
                ->get();
            foreach ($posts as $item) {
                $item->update([
                    'priority' => $item->priority - 1,
                ]);
            }
            $post->update([
                'priority' => 0,
            ]);
        }
    }

    public function changeStatus(Post $post)
    {
        $post->update([
            'public' => !$post->public,
        ]);
    }
}