<?php

namespace App\RepositoryPattern;

use App\Models\Post;

class PostRepo implements PostRepoInterface {

    public function store($data){
       return Post::create([
            'content' => $data['tweet'],
            'user_id' => auth()->user()->id,
        ]);
    }

    public function update(Post $post, array $data){
        $post->update([
            'content' => $data['content'],
        ]);
    }

    public function getAll(){
      return  Post::with(['comments', 'user'])->latest()->get();
    }

    public function destroy($id){
       $post = Post::findOrFail($id);
        $post->delete();
    }

}