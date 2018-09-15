<?php

namespace App\Contracts\Repositories;

interface UserRepository extends AbstractRepository
{
    public function login($data);

    public function inActive($id, $data);

    public function getPosts($id);

    public function getQuestions($id);

    public function updateUser($id, $newPass, array $data);
}