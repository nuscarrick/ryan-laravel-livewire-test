<?php

namespace App\Livewire;

use Livewire\Component;

class Kanye extends Component
{
    public $data = [
      "All you have to be is yourself",
      "Believe in your flyness...conquer your shyness.",
      "Burn that excel spread sheet",
      "Decentralize",
      "Distraction is the enemy of vision",
    ];
    public function render()
    {        
        return view('livewire.kanye');
    }
}
