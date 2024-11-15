<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\Task;
use Livewire\Component;

class StartWork extends Component
{
    public $task;
    public $employee;
    public function mount(Task $task,Employee $employee) {
        $employee = Employee::find(session('employee_id'));
        $this->task = $task;
        $this->employee = $employee;
    }
    public function start() {
        $this->employee->startWork($this->task);
        $this->task->status = 'works';
        $this->task->save();
        $this->dispatch('work');
    }
    public function stop() {
        $this->employee->stopWork($this->task);
        $this->dispatch('work');
        $this->task->status = 'finish';
        $this->task->save();
    }
    public function render()
    {
        return view('livewire.start-work');
    }
}
