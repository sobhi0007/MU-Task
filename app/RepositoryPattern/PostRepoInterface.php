<?php

namespace App\RepositoryPattern;

use App\Models\Post;

interface PostRepoInterface
{
    public function store(array $data);

    public function update(Post $post, array $data);

    public function getAll();

    public function destroy($id);
}
