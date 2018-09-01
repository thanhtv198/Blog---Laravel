<?php

namespace App\Repositories;

abstract class AbstractRepositoryEloquent
{
    abstract public function model();

    public function __call($method, $parameters)
    {
        return call_user_func_array([$this->model(), $method], $parameters);
    }
}