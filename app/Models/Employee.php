<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;

    public $fillable = [
        'name',
        'username',
        'image',
        'key',
        'age',
        'salary',
        'nationality'
    ];

    public function User() {
        return $this->belongsTo(User::class);
    }

    public function Projects() {
        return $this->belongsToMany(Project::class)->withTimestamps();
    }

    public function SearchJobTitles(Project $project) {
        return employee_job_title::where('employee_id',$this->id)->where('project_id',$project->id)->first();
    }
    public function JobTitles(Project $project) {
        $job =$this->SearchJobTitles($project);
        if(!empty($job)) {
            return job_title::findOrFail($job->job_title_id)->name;
        }
    }

    public function Tasks() {
        return $this->belongsToMany(Task::class)->withPivot(['working'])->withTimestamps();
    }

    public function Records() {
        return $this->belongsToMany(Record::class)->withPivot(['status'])->withTimestamps();
    }

    public function iAMWorking() {
    return $this->Tasks()->where('working','work');
    }

    public function startWork(Task $task) {
        $this->Tasks()->updateExistingPivot($task->id,['working'=> 'work']);
    }

    public function stopWork(Task $task) {
        $this->Tasks()->updateExistingPivot($task->id,['working' => 'notwork']);
    }

    public function employee_job($pg,$tk) {
        return $this->JobTitles()->attach($pg,$tk);
    }

    public function checkToDay(Record $record) {
        return DB::table('employee_record')->where("record_id",$record->id)->where("employee_id",$this->id)->whereDate('created_at',Carbon::now()->toDateString())->get();
    }

    public function recordEmployee($record,$status) {
        return $this->Records()->attach($record->id,['status'=>$status]);
    }

    public function iWorkHere(Project $project) {
        return $this->Projects()->where('project_id',$project->id)->exists();
    }

    public static function  employee_auth($id) {
        return  optional(Employee::where('id',$id))->first();
    }

    public function employeeFilterDate($fromDate,$toDate) {
        return DB::table('employee_record')->where('employee_id',$this->id)->whereBetween('created_at',[$fromDate,$toDate])->get();
    }

    public function isTime($formDate,$toDate) {
        return  $this->Records()->where("Employee_id",$this->id)->wherePivotBetween('created_at',[$formDate,$toDate])->get();
    }

    public function image() {
        $image =  $this->image;
        if(strpos($this->image,'ui-avatars.com') > 0) {
            return $image;
        }
        return asset('storage/'. $image);
    }

}
