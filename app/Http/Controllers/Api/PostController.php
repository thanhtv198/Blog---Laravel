<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }
 
    public function show($id)
    {
        return Post::findOrFail($id);
    }
 
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
 
        return $post;
    }
 
    public function store(Request $request)
    {
        $post = Post::create($request->all());

        return $post;
    }
 
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return '';
    }
}
