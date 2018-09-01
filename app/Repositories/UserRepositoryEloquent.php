<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepository;
use App\Repositories\PostRepositoryEloquent;
use App\Models\User;

class UserRepositoryEloquent extends AbstractRepositoryEloquent implements UserRepository
{
    public function model()
    {
        return app(User::class);
    }

    public function login($data)
    {

    }
}