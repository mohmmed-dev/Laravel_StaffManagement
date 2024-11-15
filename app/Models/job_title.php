<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job_title extends Model
{
    /** @use HasFactory<\Database\Factories\JobTitleFactory> */
    use HasFactory;

    public $fillable = [
        'name'
    ];

    public function Employees() {
        return $this->belongsToMany(Employee::class);
    }
}
