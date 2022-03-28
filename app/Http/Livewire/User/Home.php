<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Home extends Component
{
 

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.user.home')->layout('layouts.user');
    }

 
}
