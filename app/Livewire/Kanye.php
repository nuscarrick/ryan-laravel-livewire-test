<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\KanyeService;

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
        $kanyeService = new KanyeService();
        $this->data = $kanyeService->getList();        
        return view('livewire.kanye');
    }

    public function refresh(){
        $kanyeService = new KanyeService();
        $this->data = $kanyeService->getList();
    }
}
