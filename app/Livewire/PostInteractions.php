<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostInteractions extends Component
{

  public $posts;

    public function mount()
    {
        // Fetch all posts with their comments using Eloquent relationships
        $this->posts = Post::with(['comments','user'])->get();
    }

    public function render()
    {  
        $this->posts = Post::with('comments')->get();
        return view('livewire.post-interactions', [
            'posts' => $this->posts,
        ]);
    }
}
