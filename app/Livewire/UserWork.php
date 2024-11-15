<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class UserWork extends Component
{
    public $work;
    #[On("work")]
    public function render()
    {
        return view('livewire.user-work');
    }
}
