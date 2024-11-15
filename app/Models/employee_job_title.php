<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee_job_title extends Model
{
    use HasFactory;

    public $table = 'employee_job_title';
    public $fillable = [
        'employee_id',
        'project_id',
        'job_title_id'
    ];

}
