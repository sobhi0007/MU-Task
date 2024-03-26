<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreateNewPost extends Component
{
    public $tweet;
    public function postTweet(){

        $this->validate([
            'tweet' => 'required|max:255',
        ]);

        Post::create([
            'content'=>$this->tweet,
            'user_id'=>auth()->user()->id,
        ]);
        $this->tweet='';

    }

    public function render()
    {
        return view('livewire.create-new-post');
    }

}
