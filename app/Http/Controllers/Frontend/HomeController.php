<?php

namespace App\Http\Controllers\Frontend;

use App\Contracts\Repositories\PostRepository;
use App\Contracts\Repositories\TagRepository;
use App\Contracts\Repositories\TopicRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    protected $postRepository;

    protected $topicRepository;

    protected $tagRepository;

    public function __construct(
        PostRepository $postRepository,
        TopicRepository $topicRepository,
        TagRepository $tagRepository
    ) {
        $this->topicRepository = $topicRepository;
        $this->postRepository = $postRepository;
        $this->tagRepository = $tagRepository;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->postRepository->paginate();
        $tags = $this->tagRepository->getTagHome();

        return view('frontend.home', compact('data', 'tags'));
    }

    public function searchPost(Request $request)
    {
        if ($request->has('key')) {
            $data = Post::search($request->key)->paginate(2);
        } else {
            $data = Post::paginate(2);
        }
        
        return view('frontend.home', compact('data'));
    }
}
