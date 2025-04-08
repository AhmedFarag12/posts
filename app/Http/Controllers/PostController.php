<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

use App\Repositories\PostRepositoryInterface;

class PostController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface  $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->index();
        return response()->json($posts);
    }
    public function store(CreatePostRequest $request)
    {

        $data = $request->all();
        $data['user_id'] = $request->user()->id;

        $post = $this->postRepository->store($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Post created successfully',
            'post' => $post
        ], 201);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $updated = $this->postRepository->update($request->all(), $post);
        return response()->json([
            'status' => 'success',
            'message' => 'Post updated successfully',
            'post' => $post
        ]);

    }

    public function destroy(Post $post)
    {
        $this->postRepository->destroy($post);

        return response()->json([
            'status' => 'success',
            'message' => 'Post deleted successfully'
        ]);
    }
}
