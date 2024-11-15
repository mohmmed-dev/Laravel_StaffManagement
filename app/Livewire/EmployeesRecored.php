<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\Project;
use Livewire\Component;

use function Pest\Laravel\options;

class EmployeesRecored extends Component
{
    public $employee;
    public $project;
    public function mount() {
        $employee_id = session('employee_id');
        if(Employee::employee_auth($employee_id)) {
            $this->employee = Employee::employee_auth($employee_id);
        }
    }
    public function isNotRecord() {
        if(!empty($this->employee) && $this->employee->iWorkHere($this->project)) {
            return $this->employee->checkToDay($this->project->Record)->first();
        }
        return true;
    }
    public function recordMe() {
        return $this->employee->recordEmployee($this->project->Record,"exists");
    }
    public function render()
    {
        return view('livewire.employees-recored');
    }
}
