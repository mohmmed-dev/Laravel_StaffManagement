<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;
    public  $fillable = [
        'name','description','type', 'key'
    ];
    public  $hidden = [
        'key'
    ];
    public function Users() {
        return $this->belongsToMany(User::class)->withPivot(["isManger"])->withTimestamps();
    }

    public function Employees() {
        return $this->belongsToMany(Employee::class)->withTimestamps();
    }

    public function job_titles() {
        return $this->belongsToMany(job_title::class,'employee_job_title');
    }

    public function Tasks() {
        return $this->hasMany(Task::class);
    }

    public function Record() {
        return $this->hasOne(Record::class);
    }

    public function addEmployee(Employee $employee) {
        return $this->Employees()->attach($employee);
    }

    public function isMyEmployee(Employee $employee) {
        return $this->Employees()->where('employee_id',$employee->id)->exists();
    }

    public function Employees_Records() {
        return $this->Record->GetTodayRecord();
    }
}
