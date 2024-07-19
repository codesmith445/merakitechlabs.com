<?php

namespace App\Livewire;

use Livewire\Component;

class StepForm extends Component
{   
    public $steps = [];

    public function addStep() {
        $stepCount = count($this->steps) + 1;
    
        $this->steps[] = [
            'step_number' => $stepCount,
            'image' => null,
            'instructions' => '',
            'source_code' => ''
        ];
    }
    
    public function removeStep($index) {
        unset($this->steps[$index]);
        $this->steps = array_values($this->steps);
    }
    public function render()
    {
        return view('livewire.step-form');
    }
}
