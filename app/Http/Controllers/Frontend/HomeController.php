<?php

namespace App\Http\Controllers\Frontend;

use App\Contracts\Repositories\PostRepository;
use App\Contracts\Repositories\TagRepository;
use App\Contracts\Repositories\TopicRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $postRepository;

    protected $topicRepository;

    protected $tagRepository;

    public function __construct(
        PostRepository $postRepository,
        TopicRepository $topicRepository,
        TagRepository $tagRepository
    )
    {
        $this->topicRepository = $topicRepository;
        $this->postRepository = $postRepository;
        $this->tagRepository = $tagRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
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
        $data = $this->postRepository->search($request->key);

        return view('frontend.home', compact('data'));
    }
}
