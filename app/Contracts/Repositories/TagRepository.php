<?php

namespace App\Contracts\Repositories;

interface TagRepository extends AbstractRepository
{
    public function getTagHome();

    public function getPostByTag($id);
}