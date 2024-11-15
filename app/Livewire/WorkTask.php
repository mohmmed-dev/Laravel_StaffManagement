<?php

namespace App\Livewire;

use Livewire\Component;

class WorkTask extends Component
{
    public $tasks;
    public function render()
    {
        return view('livewire.work-task');
    }
}
