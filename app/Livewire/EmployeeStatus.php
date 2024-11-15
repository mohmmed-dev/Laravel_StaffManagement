<?php

namespace App\Livewire;

use Livewire\Component;

class EmployeeStatus extends Component
{
    public $employeeStatus;
    public function render()
    {
        return view('livewire.employee-status');
    }
}
