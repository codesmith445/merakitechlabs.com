<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class FilterPosts extends Component
{   

    public $category;

    public function render()
    {
        return view('livewire.filter-posts');
    }

    public function filterPosts($category)
    {
        $this->category = $category;
        $this->dispatch('categorySelected', $category);
    }
    
}
