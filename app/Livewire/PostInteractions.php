<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;
use Illuminate\Contracts\Encryption\DecryptException;

class PostInteractions extends Component
{
    public $posts;
    public $comments;
    public $comment;
    public $content;
    public $post;

    public function mount()
    {
        $this->posts = Post::with(['comments', 'user'])->latest()->get();
    }

    public function postDelete($postId)
    {

        $id = $this->decryptID($postId);
        $post = Post::where('user_id', auth()->user()->id)->findOrfail($id);
        if ($post) {
            $post->delete();
        }
    }


    public function commentDelete($commentId)
    {
        $id = $this->decryptID($commentId);
        $comment = Comment::where('user_id', auth()->user()->id)->findOrfail($id);
        if ($comment) {
            $comment->delete();
        }
    }

    public function addNewComment(Post $post)
    {

        $this->validate([
            'comment' => 'required|max:255',
        ]);

        Comment::create([
            'comment' => $this->comment,
            'user_id' => auth()->user()->id,
            'post_id' => $post->id

        ]);

        $this->comment = '';
    }

    public function editPost($postId)
    {
        $this->post =null;
        $id = $this->decryptID($postId);
        $this->post = Post::with('media')->where('user_id', auth()->user()->id)->findOrFail($id);        
        $this->dispatch('openEditPostModal');
    }


    public function closeEditPostModal()
    {
        $this->dispatch('closeEditPostModal');
    }

    protected function decryptID($id)
    {
        try {
            $id =  decrypt($id);
        } catch (DecryptException $e) {
            auth()->guard()->logout();
            return redirect('home');
        }
        return $id;
    }

    public function render()
    {
        $this->posts = Post::with(['comments', 'user'])->latest()->get();
        return view('livewire.post-interactions');
    }
}
