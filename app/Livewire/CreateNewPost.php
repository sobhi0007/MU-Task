<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateNewPost extends Component
{
    use WithFileUploads;
    public $photo;
    public $tweet;
    public function postTweet()
    {
 
        $this->validate([
            'tweet' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
        ]);
         
       $post = Post::create([
            'content' => $this->tweet,
            'user_id' => auth()->user()->id,
        ]);

        if ($this->photo) {
            $post  ->addMedia($this->photo->getRealPath())
            ->usingName($this->photo->getClientOriginalName())
            ->toMediaCollection('images');
        }
       
        $this->tweet = '';
        $this->photo = '';
    }

    public function render()
    {
        return view('livewire.create-new-post');
    }
}
