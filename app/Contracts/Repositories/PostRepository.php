<?php

namespace App\Contracts\Repositories;

interface PostRepository extends AbstractRepository
{
    public function pending($id);

    public function paginate();

    public function getTags($id);

    public function inActive($id, $data);
}