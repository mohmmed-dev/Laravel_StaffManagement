<?php

namespace App\Livewire;

use Livewire\Component;

class StatusTask extends Component
{
    public $status;
    public function render()
    {
        return view('livewire.status-task');
    }
}
