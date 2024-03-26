<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostInteractions extends Component
{
    public $posts;

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

    public function render()
    {  
        $this->posts = Post::with(['comments','user'])->latest()->get();
        return view('livewire.post-interactions');
    }
}
