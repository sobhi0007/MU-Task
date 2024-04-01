<?php

namespace App\Livewire;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\RepositoryPattern\PostRepoInterface;

class CreateNewPost extends Component
{
    use WithFileUploads;
    public $photo;
    public $tweet;
    protected $postRepo;

    public function postTweet()
    {
       
        // dd($this->photo);
        $this->validate([
            'tweet' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:4096', 
        ]);

        $this->postRepo = app(PostRepoInterface::class);
        $post = $this->postRepo->store(['tweet'=>$this->tweet]);
       
        if ($this->photo) {
            $post->addMedia($this->photo->getRealPath())
            ->usingName($this->photo->getClientOriginalName())
            ->toMediaCollection('images');
        }
     
        $this->tweet = '';
        $this->photo = '';
        $this->dispatch('fileInputReset');
    }

    public function render()
    {
        return view('livewire.create-new-post');
    }
}
