<?php

namespace App\Contracts\Repositories;

interface UserRepository extends AbstractRepository
{
    public function login($data);

    public function inActive($id, $data);
}