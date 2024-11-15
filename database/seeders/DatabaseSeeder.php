<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\job_title;
use App\Models\Record;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ProjectSeeder::class,
            EmployeeSeeder::class,
            // JobTitleSeeder::class,
            RecordSeeder::class,
            TaskSeeder::class
        ]);
    }
}
