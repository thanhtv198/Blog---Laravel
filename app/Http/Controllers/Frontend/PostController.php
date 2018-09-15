<?php

namespace App\Http\Controllers\Frontend;

use App\Contracts\Repositories\PostRepository;
use App\Http\Requests\CommentRequets;
use App\Http\Requests\PostRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class PostController extends Controller
{
    protected $repository;

    public function __construct(PostRepository $repository)
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
        $data = $this->repository->paginate();

        return view('frontend.post.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $data = $request->only('content', 'title');

        $this->repository->store($data);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->repository->show($id);

        $tags = $this->repository->getTags($id);

        $comments = Comment::getById($id);

        return view('frontend.post.detail', compact('post', 'tags', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->repository->edit($id);

        return view('frontend.post.edit', compact('post'));
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
        $data = $request->only('title', 'content');
//dd($data);
        $this->repository->update($id, $data);

        return redirect()->route('home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd(4);
    }

    /**
     * @param CommentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function comment(Request $request, $id)
    {
        $request->merge([
            'user_id' => Auth::user()->id,
            'status' => 1,
            'commentable_id' => $id,
            'commentable_type' => 'post',
        ]);

        $comment = Comment::create($request->all());

        return response()->json($comment);
    }


    public function reply(Request $request, $id)
    {
       $comment =  Comment::create([
            'user_id' => Auth::user()->id,
            'status' => 1,
            'content' => $request->repContent,
            'commentable_id' => $id,
            'commentable_type' => 'post',
            'parent_id' => $request->parent_id,
        ]);

        return response()->json([
            'comment' => $comment,
            'username' => auth()->user()->name,
        ]);

    }
}
