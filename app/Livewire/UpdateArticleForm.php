<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Article;
use App\Models\ArticleStep;
use Livewire\WithFileUploads;

class UpdateArticleForm extends Component
{   
    use WithFileUploads;
    public $article;

    // Define properties for fields to update
    public $category;
    public $title;
    public $header;
    public $paragraph;
    public $image;
    public $step_header;
    public $steps = [];
    public $stepImageFiles = [];
    public $imageFile; // Add this property for handling image uploads

    public function mount(Article $article)
    {
        // Initialize properties with post data
        $this->article = $article;
        $this->category = $article->category;
        $this->title = $article->title;
        $this->paragraph = $article->paragraph;
        $this->header = $article->header;
        $this->image = $article->image;
        $this->step_header = $article->step_header;
        $this->steps = $article->steps->toArray();
    }

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

        if (isset($this->steps[$index]['id'])) {
            // Delete the step from the database if it exists
            $articleStep = ArticleStep::find($this->steps[$index]['id']);
            $articleStep->delete();
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
        $this->article->update([
            'category' => $this->category,
            'title' => $this->title,
            'header' => $this->header,
            'paragraph' => $this->paragraph,
            'image' => $this->imageFile ? $this->imageFile->store('images', 'public') : $this->article->image,
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
                $articleStep = ArticleStep::find($step['id']);
                $articleStep->update([
                    'step_number' => $step['step_number'], // Set the step number
                    'image' => $step['image'],
                    'paragraph' => $step['paragraph'],
                    'step_header' => $step['step_header'],
                    // Update other step fields as needed
                    // Update other step fields as needed
            'image' => isset($this->stepImageFiles[$index]) ? $this->stepImageFiles[$index]->store('images', 'public') : $articleStep->image
                ]);
                // dd($step['step_header']);
            } else {
                // Create new step
                $articleStep = new ArticleStep([
                    'step_number' => $step['step_number'],
                    'image' => $step['image'],
                    'paragraph' => $step['paragraph'],
                    'step_header' => $step['step_header'],
                    // Add other fields as needed
                    'image' => isset($this->stepImageFiles[$index]) ? $this->stepImageFiles[$index]->store('images', 'public') : null
                ]);
                // dd($step['step_header']);
                $this->article->steps()->save($articleStep);
            }

        }

        session()->flash('message', 'Post updated successfully!');
        return redirect()->route('articles.index');
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
    public function render()
    {
        return view('livewire.update-article-form');
    }
}
