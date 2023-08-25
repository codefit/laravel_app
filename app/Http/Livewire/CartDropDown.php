<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CartDropDown extends Component
{
    protected $listeners = ['updateCounter' => 'render'];

    public function render()
    {
        return view('livewire.cart-drop-down', [
            'number' => Session::get("counter")
        ]);
    }
}
