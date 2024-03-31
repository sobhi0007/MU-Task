<?php

namespace App\RepositoryPattern;

use App\Models\Comment;

interface CommentRepoInterface
{
    public function store(array $data);
    
    public function getAll();

    public function destroy(Comment $comment);
}
