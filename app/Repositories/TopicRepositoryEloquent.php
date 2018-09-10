<?php

namespace App\Repositories;

use App\Contracts\Repositories\TopicRepository;
use App\Models\Topic;

class TopicRepositoryEloquent extends AbstractRepositoryEloquent implements TopicRepository
{

    public function model()
    {
        return app(Topic::class);
    }

    public function all()
    {
        $topic = $this->model()
            ->latest()
            ->get();

        return $topic;
    }

    public function show($id)
    {
        return $this->model()->findOrFail($id);
    }

    public function store(array $data)
    {
        return $this->model()->create([
            'title' => $data['title'],
            'slug' => $data['slug'],
            'description' => $data['description'],
            'content' => $data['content'],
            'status' => $data['active'],
            'image' => $data['image'],
            'view' => $data['view'],
        ]);
    }

    public function update($id, array $data)
    {
        $topic = $this->model()->findOrFail($id)->update([
            'name' => $data['name'],
            'slug' => $data['slug'],
        ]);

        return $topic;
    }

    public function destroy($id)
    {
        $topic = $this->model()->fincOrFail($id);

        return $topic->delete();
    }

    public function active($id)
    {
        $topic = $this->model()->findOrFail($id)->update([
            'status' => config('blog.topic.active'),
        ]);

        return $topic;
    }

    public function inactive($id)
    {
        $topic = $this->model()->findOrFail($id)->update([
            'status' => config('blog.topic.inactive'),
        ]);

        return $topic;
    }

    public function getPostById($id)
    {
        return $this->model()->findOrFail($id)->posts;
    }

    public function paginate()
    {
        $topics = $this->model()
        ->latest()
        ->paginate(config('blog.topic.paginate'));

        return $topics;
    }
}