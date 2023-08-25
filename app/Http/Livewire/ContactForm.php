<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactForm extends Component
{
    public function render()
    {
        return view('livewire.contact-form');
    }
    public $name;

    public $email;



    protected $rules = [

        'name' => 'required|min:6',

        'email' => 'required|email',

    ];



    public function submit()

    {

        $this->validate();


    }

}
