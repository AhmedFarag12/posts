<?php

namespace App\Repositories;
use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{
    public function index()
    {
        return Post::all();
    }

    public function store(array $data)
    {
        return Post::create($data);
    }

    public function update(array $data, Post $post)
    {
        return $post->update($data);
    }

    public function destroy(Post $post)
    {
        return $post->delete();
    }
}
