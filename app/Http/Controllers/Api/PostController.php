<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Repositories\PostRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * @var PostRepository
     */
    protected $repository;

    /**
     * PostController constructor.
     * @param PostRepository $repository
     */
    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $response = $this->repository->all();

        return response()->json($response);
    }

    /**
     * @param Post $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $response = $this->repository->show($id);

        return response()->json($response);
    }

    /**
     * @param Request $request
     * @param Post $post
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $data = $request->only([

        ]);

        return $this->repository->update($id, $data);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $data = $request->only([

        ]);

        return $this->repository->store($data);
    }

    /**
     * @param Post $post
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->repository->store($id);
    }
}
