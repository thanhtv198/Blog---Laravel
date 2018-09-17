<?php

namespace App\Http\Controllers\Frontend;

use App\Contracts\Repositories\PostRepository;
use App\Contracts\Repositories\TagRepository;
use App\Contracts\Repositories\TopicRepository;
use App\Events\NotifyWelcome;
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        event(new NotifyWelcome("thank you login login!"));
        $data = $this->postRepository->paginate();
        $tags = $this->tagRepository->getTagHome();

        return view('frontend.home', compact('data', 'tags'));
    }

    /**
     * Search post
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchPost(Request $request)
    {
        if ($request->has('key')) {
            $data = Post::search($request->key)->paginate(2);
        } else {
            $data = Post::latest()->paginate(2);
        }
        
        return view('frontend.home', compact('data'));
    }
}
