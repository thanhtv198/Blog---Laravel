<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepository;
use App\Repositories\PostRepositoryEloquent;
use App\Models\User;
use Auth;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;

class UserRepositoryEloquent extends AbstractRepositoryEloquent implements UserRepository
{
    public function model()
    {
        return app(User::class);
    }

    public function login($data)
    {
        $data = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];

        $remember = (Input::has('remember')) ? true : false;

        if (Auth::attempt($data, $remember)) {
            return true;
        }

        return false;
    }

    public function all()
    {
        return $this->model()->latest()->get();
    }

    public function show($id)
    {
        // TODO: Implement show() method.
    }

    public function store(array $data)
    {
        // TODO: Implement store() method.
    }

    public function update($id, array $data)
    {
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }

    public function active($id)
    {
        $post = $this->model()->findOrFail($id);

        $post->update([
            'status' => config('blog.user.status.active'),
        ]);
    }

    public function inActive($id, $data)
    {
        $post = $this->model()->findOrFail($id);
       
        $post->update([
            'status' => config('blog.user.status.inactive'),
            'block_reason' => $data,
        ]);
    }
}