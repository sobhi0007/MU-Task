<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;

class PostInteractions extends Component
{
    public $posts;
    public $comments;
    public $comment;
    public function mount()
    {
        $this->posts = Post::with(['comments','user'])->latest()->get();
    }

    public function postDelete($postId)
    {
        $post = Post::where('user_id',auth()->user()->id)->findOrfail($postId);
        if($post ) {
            $post->delete();
        }
        
    }

    
    public function commentDelete($commentId)
    {
        $comment = Comment::where('user_id',auth()->user()->id)->findOrfail($commentId);
        if($comment ) {
            $comment->delete();
        }
    }

    public function addNewComment(Post $post){
        
        $this->validate([
            'comment' => 'required|max:255',
        ]);

        Comment::create([
            'comment'=>$this->comment,
            'user_id'=>auth()->user()->id,
            'post_id'=> $post->id

        ]);
        
        $this->comment='';
    }

    public function render()
    {  
        $this->posts = Post::with(['comments','user'])->latest()->get();
        return view('livewire.post-interactions');
    }
}
