<?php

namespace App\Contracts\Repositories;

interface TopicRepository extends AbstractRepository
{
    public function getPostById($id);

    public function paginate();
}