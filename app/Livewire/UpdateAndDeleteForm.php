<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\PostStep;
use Livewire\WithFileUploads;

class UpdateAndDeleteForm extends Component
{   
    use WithFileUploads;
    public $post;

    // Define properties for fields to update
    public $category;
    public $title;
    public $goals;
    public $project_url;
    public $project_detail;
    public $image;
    public $source_code;
    public $instructions;
    public $step_header;
    public $steps = [];
    public $stepImageFiles = [];
    public $imageFile; // Add this property for handling image uploads

    public function mount(Post $post)
    {
        // Initialize properties with post data
        $this->post = $post;
        $this->category = $post->category;
        $this->title = $post->title;
        $this->goals = $post->goals;
        $this->project_url = $post->project_url;
        $this->project_detail = $post->project_detail;
        $this->image = $post->image;
        $this->source_code = $post->source_code;
        $this->instructions = $post->instructions;
        $this->step_header = $post->step_header;
        $this->steps = $post->steps->toArray();
    }

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

        if (isset($this->steps[$index]['id'])) {
            // Delete the step from the database if it exists
            $postStep = PostStep::find($this->steps[$index]['id']);
            $postStep->delete();
        }
    
        // Unset the step from the array
        unset($this->steps[$index]);
        $this->steps = array_values($this->steps);
        // unset($this->steps[$index]);
        // $this->steps = array_values($this->steps);
        foreach ($this->steps as $i => $step) {
            $this->steps[$i]['step_number'] = $i + 1;
        }
    }

    public function update()
    {
        // Update post
        $this->post->update([
            'category' => $this->category,
            'title' => $this->title,
            'goals' => $this->goals,
            'project_url' => $this->project_url,
            'project_detail' => $this->project_detail,
            'image' => $this->imageFile ? $this->imageFile->store('images', 'public') : $this->post->image,
            'source_code' => $this->source_code,
            'instructions' => $this->instructions,
        ]);


        // if ($this->image) {
        //     $imagePath = $this->image->store('/admin/img', 'public');
        //     $post->image = $imagePath;
        // }
        // if ($this->imageFile) {
        //     // Store the uploaded image file and update the image path
        //     $this->image = $this->imageFile->store('/admin/img', 'public');
        // }

        // Handle step image uploads
        foreach ($this->steps as $index => $step) {
            if (isset($this->stepImageFiles[$index])) {
                $this->steps[$index]['image'] = $this->stepImageFiles[$index]->store('images', 'public');
            }
        }

        // Update steps
        foreach ($this->steps as $index => $step) {
            // dd($this->stepImageFiles[$index]);
            if (isset($step['id'])) {
                // Update existing step
                $postStep = PostStep::find($step['id']);
                $postStep->update([
                    'step_number' => $step['step_number'], // Set the step number
                    'instructions' => $step['instructions'],
                    'source_code' => $step['source_code'],
                    'step_header' => $step['step_header'],
                    // Update other step fields as needed
                    // Update other step fields as needed
            'image' => isset($this->stepImageFiles[$index]) ? $this->stepImageFiles[$index]->store('images', 'public') : $postStep->image
                ]);
                // dd($step['step_header']);
            } else {
                // Create new step
                $postStep = new PostStep([
                    'step_number' => $step['step_number'],
                    'instructions' => $step['instructions'],
                    'source_code' => $step['source_code'],
                    'step_header' => $step['step_header'],
                    // Add other fields as needed
                    'image' => isset($this->stepImageFiles[$index]) ? $this->stepImageFiles[$index]->store('images', 'public') : null
                ]);
                $this->post->steps()->save($postStep);
            }

        }

        session()->flash('message', 'Post updated successfully!');
        return redirect()->route('admin.dashboard');
    }
    

    public function deletePost($postId)
{
    try {
        $post = Post::findOrFail($postId);
        $post->delete();
        $this->deleteSuccessMessage = 'Post successfully deleted.';
        $this->dispatch('postDeleted'); // Emit an event after deletion
        $this->dispatch('closeModal'); // Emit closeModal event to close the modal
    } catch (\Exception $e) {
        $this->deleteSuccessMessage = 'Error: ' . $e->getMessage();
    }
}

    

    public function render()
    {
        return view('livewire.update-and-delete-form');
    }
}
