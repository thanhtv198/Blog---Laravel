<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\UserRepository;
use App\Http\Requests\LoginRequet;
use App\Http\Requests\UserRequets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class UserController extends Controller
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->repository->all();

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * @param UserRequets $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequets $request)
    {
        $this->uploadImage($request->file('image'));

        $this->repository->store($request->all());

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->repository->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showLoginForm()
    {
        return view('auth.login_admin');
    }

    public function login(LoginRequet $request)
    {
        $data = $request->all();

        if ($this->repository->login($data)) {
            return redirect('admin/home')->with('success', trans('en.login.success'));
        } else {
            return back()->with('message', trans('en.login.failed'));
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('admin/login');
    }

    public function activeUser($id)
    {
        return $this->repository->active($id);
    }

    public function inActiveUser(Request $request, $id)
    {
        $data = $request->reason;
        
        return $this->repository->inActive($id, $data);
    }
}
