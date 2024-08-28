<?php

namespace App\Livewire\Module\Perkuliahan;

use Livewire\Attributes\Title;
use Livewire\Component;

class Cloud extends Component
{
    #[Title('Cloud')]

    public function render()
    {
        return view('livewire.module.perkuliahan.cloud');
    }
}
