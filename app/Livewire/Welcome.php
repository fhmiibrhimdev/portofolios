<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class Welcome extends Component
{
    #[Title('Fahmi Ibrahim')]

    public function render()
    {
        return view('livewire.welcome')->extends('components.layouts.welcome');
    }
}
