<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\Project;
use Livewire\Component;

class BoxEmployees extends Component
{
    
    public $project;
    public function away(Project $project ,Employee $employee)  {
        return redirect()->route('project.employees.show',[$project->id,$employee->id]);
    }
    public function render()
    {
        return view('livewire.box-employees');
    }
}
