<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Article;
use App\Models\ArticleStep;

class ArticleForm extends Component
{   
    use WithFileUploads;
    public $category = 'ai';
    public $title;
    public $header;
    public $paragraph;
    public $image;
    public $steps = [];
    public $createdArticleMessage;
    protected $listeners = ['articleCreated'];
    

    public function addStep()
    {   $stepNumber = count($this->steps) +1;
        $this->steps[] = [
            'step_number' => $stepNumber,
            'image' => null,
            'paragraph' => '',
            'step_header' => ''
        ];
    }

    public function removeStep($index)
    {
        unset($this->steps[$index]);
        $this->steps = array_values($this->steps);
    }

    public function store()
    {  
        // $post = new Post();
        // $post->category = $this->category;
        // $post->title = $this->title;
        // $post->goals = $this->goals;
        // $post->project_url = $this->project_url;
        // $post->project_detail = $this->project_detail;
        // // dd($this->category);
        // if ($this->image) {
        //     $imagePath = $this->image->store('/admin/img', 'public');
        //     $post->image = $imagePath;
        // }

        // $post->source_code = $this->source_code;
        // $post->instructions = $this->instructions;
        // $post->save();

        // foreach($this->steps as $step) {
        //     $postStep = New PostStep();
        //     $postStep->post_id = $post->id;
        //     // $postStep->post_id = $step['post_id'];
        //     $postStep->step_number = $step['step_number'];
        //     $postStep->instructions = $step['instructions'];
        //     $postStep->source_code = $step['source_code'];
        //     if(isset($step['image'])) {
        //         $imagePath = $step['image']->store('/admin/img', 'public');
        //         $postStep->image = $imagePath;
        //     }
        //     // dd($postStep);
        //     $postStep->save();
        // }
        // $this->createdPostMessage = 'New Post Created Successfully';
        // // $this->dispatch('postCreated');
        // $this->dispatch('closeModal');

        try {
            $article = new Article();
            $article->category = $this->category;
            $article->title = $this->title;
            $article->header = $this->header;
            $article->paragraph = $this->paragraph;
            if ($this->image) {
                $imagePath = $this->image->store('/admin/img', 'public');
                $article->image = $imagePath;
            }
            $article->save();
            foreach($this->steps as $step) {
                $articleStep = New ArticleStep();
                $articleStep->article_id = $article->id;
                // $postStep->post_id = $step['post_id'];
                $articleStep->step_number = $step['step_number'];
                $articleStep->paragraph = $step['paragraph'];
                $articleStep->step_header = $step['step_header'];
                if(isset($step['image'])) {
                    $imagePath = $step['image']->store('/admin/img', 'public');
                    $articleStep->image = $imagePath;
                }
                // dd($postStep);
                $articleStep->save();
            }
            // $this->createdPostMessage = 'New Post Created Successfully';
            // dd($this->createdPostMessage);
            $this->dispatch('articleCreated');
            $this->dispatch('closeModal');
            $this->reset();
            $this->createdArticleMessage = 'New Article Created Successfully';
        } catch (\Exception $e) {
            // Log or display the error
            $this->createdArticleMessage = 'Error: ' . $e->getMessage();
        }
      
    }
    

    public function mount()
    {
        // Set the default category to PHP
        $this->category = 'ai';
    }
    
    public function render()
    {
        return view('livewire.article-form');
    }
}
