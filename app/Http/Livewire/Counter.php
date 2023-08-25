<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Counter extends Component
{
    public $count = 0;

    public function increment()
    {
        $this->count++;
        Session::put('counter', $this->count);
        $this->emit('updateCounter');
    }

    public function decrement()
    {
        $this->count--;
        Session::put('counter', $this->count);
        $this->emit('updateCounter');
    }

    public function init()
    {
        $this->count = 0;
        Session::put('counter', $this->count);
        $this->emit('updateCounter');
    }

    public function render()
    {
        $this->count = Session::get('counter') ?: 0;
        return view('livewire.counter');
    }

}
