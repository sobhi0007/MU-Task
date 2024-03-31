<?php

namespace App\RepositoryPattern;

use App\Models\Comment;

class CommentRepo implements CommentRepoInterface {

    public function store($data){
       return  Comment::create([
        'comment' => $data['comment'],
        'user_id' => auth()->user()->id,
        'post_id' => $data['post_id']

    ]);

    }

    public function getAll(){
      return  Comment::with(['comments', 'user'])->latest()->get();
    }

    public function destroy(Comment $comment){
        $comment->delete();
    }

}