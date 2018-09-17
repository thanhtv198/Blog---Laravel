<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\UserRepository;
use App\Http\Requests\LoginRequet;
use App\Http\Requests\UserRequest;
use App\Models\User;
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
     * Display a listing of the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->repository->all();

        return view('admin.user.index', compact('users'));
    }

    /**
     * Stoure
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $this->uploadImage($request->file('image'));

        $this->repository->store($request->all());

        return back();
    }

    /**
     * Show detail user own
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->repository->show($id);

        $posts = $user->posts()->paginate(config('blog.post.paginate'));

        $questions = $user->questions()->paginate(config('blog.question.paginate'));

        return view('admin.user.detail', compact('user', 'posts', 'questions'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->destroy($id);
    }

    /**
     * Show login form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login_admin');
    }

    /**
     * Amin login
     *
     * @param LoginRequet $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequet $request)
    {
        $data = $request->all();

        if ($this->repository->login($data)) {
            return redirect('admin/home')->with('success', trans('en.login.success'));
        } else {
            return back()->with('message', trans('en.login.failed'));
        }
    }

    /**
     * Admin logout
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        Auth::logout();

        return redirect('admin/login');
    }

    /**
     * Active user
     *
     * @param int $id
     * @return mixed
     */
    public function activeUser($id)
    {
        return $this->repository->active($id);
    }

    /**
     * Block user
     *
     * @param Request $request
     * @param int $id
     * @return mixed
     */
    public function inActiveUser(Request $request, $id)
    {
        $data = $request->reason;
        
        return $this->repository->inActive($id, $data);
    }
}
