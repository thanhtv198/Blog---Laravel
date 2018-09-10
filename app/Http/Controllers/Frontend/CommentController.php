<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\CommentRequets;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

//    public function comment(CommentRequets $request)
//    {
//        $request->merge([
//            'user_id' => Auth::user()->id,
//            'status' => 1,
//        ]);
//
//        Comment::create($request->all());
//
//        return back();
//    }
//
//    /**
//     * @param CommentRequest $request
//     * @return \Illuminate\Http\RedirectResponse
//     */
//    public function reply(CommentRequets $request)
//    {
//        $request->merge([
//            'user_id' => Auth::user()->id,
//            'status' => 1,
//            'parent_id' => $request->comment_id,
//        ]);
//
//        Comment::create($request->all());
//
//        return back();
//    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequets $request)
    {
        $request->merge([
            'user_id' => Auth::user()->id,
            'status' => 1,
        ]);

        Comment::create($request->all());

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
        //
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
}
