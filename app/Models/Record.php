<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Record extends Model
{
    /** @use HasFactory<\Database\Factories\RecordFactory> */
    use HasFactory;
     protected $fillable = [
        'project_id',
    ];

    public function Employees() {
        return $this->belongsToMany(Employee::class);
    }

    public function Project() {
        return $this->belongsTo(Project::class);
    }

    public function GetTodayRecord() {
        return DB::table('employee_record')->where("record_id",$this->id)->whereDate('created_at',Carbon::now()->toDateString())->get();
    }

    // public function isTime() {
    //     return  $this->Employees()->where("record_id",$this->id)->wherePivotBetween('created_at',['2024-11-6','2024-11-8'])->exists();
    // }

}
