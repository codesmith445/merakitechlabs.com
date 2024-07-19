<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
class FilterArticles extends Component
{   
    public $category;

    public function render()
    {
        return view('livewire.filter-articles');
    }

    public function filterArticles($category)
    {
        $this->category = $category;
        $this->dispatch('categorySelected', $category);
    }
}
