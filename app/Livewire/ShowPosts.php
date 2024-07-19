<?php

namespace App\Livewire;

use Livewire\Component;
use App\models\Post;

class ShowPosts extends Component
{   
    public $selectedCategory = 'php';
    public $posts;
    public $selectedPosts;
    public $editMode = false;
    public $deleteSuccessMessage;
    public $createdPostMessage;
    

    protected $listeners = ['categorySelected', 'postCreated', 'postDeleted'];
    
    public function mount() {
        $this->loadPost();
    }
    
    public function categorySelected($category)
    {   
        $this->selectedCategory = $category;
        $this->loadPost();
    }

    public function loadPost()
    {
        // $this->posts = Post::where('category', $this->selectedCategory)->get();
        $this->posts = Post::with('steps')->where('category', $this->selectedCategory)->get();
        
    }
    
    // public function deletePost($postId)
    // {
    //     try {
    //         $post = Post::findOrFail($postId);
    //         $post->delete();
    //         $this->deleteSuccessMessage = 'Post successfully deleted.';
    //         $this->loadPost(); // Refresh posts after deletion
    //         $this->dispatch('closeModal'); // Emit closeModal event to close the modal
    //     } catch (\Exception $e) {
    //         // Log or display the error
    //         $this->deleteSuccessMessage = 'Error: ' . $e->getMessage();
    //     }
    // }

    public function postDeleted()
        {
            $this->deleteSuccessMessage = 'Post deleted successfully!';
            $this->loadPost();
        }
   
    
    public function postCreated()
    {   
        // dd('Event triggered');
        $this->createdPostMessage = 'New Post Created Successfully';
        // dd($this->createdPostMessage);
        $this->deleteSuccessMessage = null;
        $this->loadPost();
        
    }


    public function render()
    {
        return view('livewire.show-posts');
    }
}
