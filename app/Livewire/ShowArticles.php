<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class ShowArticles extends Component
{   

    public $selectedCategory = 'ai';
    public $articles;
    public $selectedArticles;
    public $editMode = false;
    public $deleteSuccessMessage;
    public $createdArticleMessage;
    

    protected $listeners = ['categorySelected', 'articleCreated'];
    
    public function mount() {
        $this->loadArticle();
    }
    
    public function categorySelected($category)
    {   
        $this->selectedCategory = $category;
        $this->loadArticle();
    }

    public function loadArticle()
    {
        $this->articles = Article::with('steps')->where('category', $this->selectedCategory)->get();
        
    }
    
    public function deleteArticle($articleId)
    {
        try {
            $article = Article::findOrFail($articleId);
            $article->delete();
            $this->deleteSuccessMessage = 'Article successfully deleted.';
            $this->loadArticle(); // Refresh posts after deletion
            $this->dispatch('closeModal'); // Emit closeModal event to close the modal
        } catch (\Exception $e) {
            // Log or display the error
            $this->deleteSuccessMessage = 'Error: ' . $e->getMessage();
        }
    }
   
    
    public function articleCreated()
    {   
        // dd('Event triggered');
        $this->createdArticleMessage = 'New Article Created Successfully';
        // dd($this->createdPostMessage);
        $this->deleteSuccessMessage = null;
        $this->loadArticle();
        
    }


    public function render()
    {
        return view('livewire.show-articles');
    }
}
