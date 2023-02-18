<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TelaNotebook extends Component
{

    public function teste()
    {
        //emit event
        $this->emit('teste');
    }
    public function render()
    {
        return view('livewire.tela-notebook');
    }
}
