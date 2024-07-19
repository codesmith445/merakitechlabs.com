<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;


class ContactForm extends Component
{   
    public $name;
    public $email;
    public $message;
    public $successMessage;
    protected $listeners = ['submitForm'];
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
    ];

    

    public function submitForm()
    {
        $this->validate();
        // Send email
        Mail::to('dark4ken@gmail.com')->send(new ContactMessage($this->name, $this->email, $this->message));
        $this->resetForm();
        $this->successMessage = 'Your message has been sent!';
        $this->dispatch('modalClosed');
        $this->dispatch('showSuccessModal');
    }

    public function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->message = '';
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
