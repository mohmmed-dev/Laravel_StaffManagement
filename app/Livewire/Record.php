<?php

namespace App\Livewire;

use Livewire\Component;

class Record extends Component
{
    public $employee;
    public function render()
    {
        return view('livewire.record');
    }
}
