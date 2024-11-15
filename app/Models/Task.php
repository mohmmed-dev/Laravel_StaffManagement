<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    public $fillable =[
        "title",
        "description",
        "status",
        "type",
        "project_id"
    ];

    public function Project() {
        return $this->belongsTo(Project::class);
    }

    public function Employees() {
        return $this->belongsToMany(Employee::class)->withPivot('working')->withTimestamps();
    }

    public function addEmployeeToTask($id) {
        return $this->Employees()->attach($id);
    }

    public function removeEmployeeFromTask($id) {
        return $this->Employees()->detach($id);
    }

    public function workNow() {
    return $this->belongsToMany(Employee::class)->withPivot(['working'])->where('working','work');
    }

    public function IsWorkHere(Employee $employee) {
    return $this->Employees()->where('employee_id',$employee->id)->exists();
    }

    public function IsWorkHereID($id) {
    return $this->Employees()->where('employee_id',$id)->exists();
    }

}
