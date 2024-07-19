<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use App\Models\PostStep;

class PostForm extends Component
{   
    use WithFileUploads;
    public $category = 'php';
    public $title;
    public $goals;
    public $project_url;
    public $project_detail;
    public $image;
    public $source_code;
    public $instructions;
    public $steps = [];
    public $createdPostMessage;
    protected $listeners = ['postCreated'];
    
    public function addStep()
    {   $stepNumber = count($this->steps) +1;
        $this->steps[] = [
            'step_number' => $stepNumber,
            'image' => null,
            'instructions' => '',
            'source_code' => '',
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
            $post = new Post();
            $post->category = $this->category;
            $post->title = $this->title;
            $post->goals = $this->goals;
            $post->project_url = $this->project_url;
            $post->project_detail = $this->project_detail;
            // dd($this->category);
            if ($this->image) {
                $imagePath = $this->image->store('/admin/img', 'public');
                $post->image = $imagePath;
            }
    
            $post->source_code = $this->source_code;
            $post->instructions = $this->instructions;
            $post->save();
            foreach($this->steps as $step) {
                $postStep = New PostStep();
                $postStep->post_id = $post->id;
                // $postStep->post_id = $step['post_id'];
                $postStep->step_number = $step['step_number'];
                $postStep->instructions = $step['instructions'];
                $postStep->source_code = $step['source_code'];
                $postStep->step_header = $step['step_header'];
                if(isset($step['image'])) {
                    $imagePath = $step['image']->store('/admin/img', 'public');
                    $postStep->image = $imagePath;
                }
                // dd($postStep);
                $postStep->save();
            }
            // $this->createdPostMessage = 'New Post Created Successfully';
            // dd($this->createdPostMessage);
            $this->dispatch('postCreated');
            $this->dispatch('closeModal');
            $this->reset();
            $this->createdPostMessage = 'New Post Created Successfully';
        } catch (\Exception $e) {
            // Log or display the error
            $this->createdPostMessage = 'Error: ' . $e->getMessage();
        }
      
    }
    

    public function mount()
    {
        // Set the default category to PHP
        $this->category = 'php';
    }

    public function render()
    {
        return view('livewire.post-form');
    }
}
