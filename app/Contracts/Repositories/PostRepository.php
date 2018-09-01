<?php

namespace App\Contracts\Repositories;

use App\Models\Post;

interface PostRepository extends AbstractRepository
{
    public function getDataAll($dataSelect = ['*']);

    public function getDataPost($id);

    public function store(array $data);

    public function edit($id);

    public function update(Post $post, array $data);

    public function destroy(Post $post);

    public function changeStatus(Post $post);
}