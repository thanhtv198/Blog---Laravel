<?php

namespace App\Http\Controllers\Frontend;

use App\Contracts\Repositories\PostRepository;
use App\Http\Requests\CommentRequets;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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

    /**
     * @param CommentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function comment(Request $request, $id)
    {
        $request->merge([
            'user_id' => Auth::user()->id,
            'status' => 1,
            'post_id' => $request->id,
        ]);

        $comment = Comment::create($request->all());

        return response()->json($comment);
    }


    public function reply(Request $request, $id)
    {       
        // return $id;
        return $request->repContent;
        $request->merge([
            'user_id' => Auth::user()->id,
            'status' => 1,
            'content' => $request->repContent,
            'post_id' => $id,
            'parent_id' => $request->parent_id,
        ]);

        return Comment::create($request);

//        $comment = Comment::create($request->all());


    }
}
