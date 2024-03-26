<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;


class CommentsInteractions extends Component
{
    public $comments;
    public $post_id;
    public $comment;

    public function mount($comments,$post_id){
        $this->comments = $comments;
        $this->post_id = $post_id;
    }
    
    public function commentDelete($commentId)
    {
        $comment = Comment::where('user_id',auth()->user()->id)->findOrfail($commentId);
        if($comment ) {
            $comment->delete();
        }
    }

    public function addNewComment(){
        $this->validate([
            'comment' => 'required|max:255',
        ]);

        Comment::create([
            'comment'=>$this->comment,
            'user_id'=>auth()->user()->id,
            'post_id'=> $this->post_id

        ]);
        $this->comment='';
    }

    
    public function render()
    {
        $this->comments=  Comment::with('user')->where('post_id',$this->post_id)->get();
        return view('livewire.comments-interactions');
    }
}
