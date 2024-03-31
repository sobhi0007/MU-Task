<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;
use App\RepositoryPattern\PostRepoInterface;
use App\RepositoryPattern\CommentRepoInterface;
use Illuminate\Contracts\Encryption\DecryptException;

class PostInteractions extends Component
{
    public $posts;
    public $comments;
    public $comment;
    public $content;
    public $post;
    protected $postRepo;
    protected $commentRepo;
    public function mount()
    {
        $this->postRepo = app(PostRepoInterface::class);
        $this->posts =  $this->postRepo->getAll() ;
    }

    public function postDelete($postId)
    {
        $id = $this->decryptID($postId);
        $post = Post::where('user_id', auth()->user()->id)->findOrfail($id);
        if ($post) {
            $this->postRepo = app(PostRepoInterface::class);
            $this->postRepo->destroy($post->id);
        }
    }


    public function commentDelete($commentId)
    {
        $id = $this->decryptID($commentId);
        $comment = Comment::where('user_id', auth()->user()->id)->findOrfail($id);
        if ($comment) {
            $this->commentRepo = app(CommentRepoInterface::class);
            $this->commentRepo->destroy($comment);
        }
    }

    public function addNewComment(Post $post)
    {

        $this->validate([
            'comment' => 'required|max:255',
        ]);

        $this->commentRepo = app(CommentRepoInterface::class);
        $this->commentRepo->store([
                'comment' => $this->comment,
                'user_id' => auth()->user()->id,
                'post_id' => $post->id
                 ]) ;
        $this->comment = '';
    }

    public function editPost($postId)
    {
        $this->post =null;
        $id = $this->decryptID($postId);
        $this->post = Post::with('media')->where('user_id', auth()->user()->id)->findOrFail($id);        
        $this->dispatch('openEditPostModal');
    }


    public function updatePost($postId)
    {
    
        $id = $this->decryptID($postId);
        $post = Post::findorFail($id);
        $this->postRepo = app(PostRepoInterface::class);
        $this->postRepo->update($post,['content'=>$this->content]);
        $this->dispatch('closeEditPostModal');
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
        $this->postRepo = app(PostRepoInterface::class);
        $this->posts =  $this->postRepo->getAll() ;
        return view('livewire.post-interactions');
    }
}
