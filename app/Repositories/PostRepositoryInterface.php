<?php

namespace App\Repositories;

use App\Models\Post;

interface PostRepositoryInterface
{
    public function index();
    public function store(array $data);
    public function update(array $data, Post $post);
    public function destroy(Post $post);
}
