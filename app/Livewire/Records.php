<?php

namespace App\Livewire;

use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Records extends Component
{
    public $project;
    public $arrEmployee = [];
    public $fromDate;
    public $toDate;
    public $takeEmployee;
    public $takeStatus;

    public function addNewRecords() {
        $employee = Employee::findOrFail($this->takeEmployee);
        $employee->recordEmployee($this->project->Record,$this->takeStatus);
    }

    public function mount() {
    $this->arrEmployee = $this->project->Employees;
    }

    public function filterDate() {
        if(empty($this->fromDate)) {
            return ;
        } elseif (empty($this->toDate)) {
        $this->toDate = now()->toDateString();
        }
    }

    public function employeeRecords(Employee $employee) {
        $this->arrEmployee = [$employee];
    }

    public function allRecords() {
        $this->fromDate = null;
        $this->toDate = null;
        $this->arrEmployee =  $this->project->Employees;
    }

    public function filtersAllRecords(Employee $employee) {
       return $employee->isTime($this->fromDate ?? $this->project->Record->created_at,$this->toDate ?? now());
    }

    public function render()
    {
        return view('livewire.records');
    }
}
