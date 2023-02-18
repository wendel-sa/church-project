<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TelaTv extends Component
{
    protected $listeners = ['teste' => 'teste'];

    public function teste()
    {
        dd('teste');
    }
    public function render()
    {
        return view('livewire.tela-tv');
    }
}
