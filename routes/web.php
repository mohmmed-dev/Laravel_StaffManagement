<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\JobTitleController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Lang;
use Illuminate\Support\Facades\Route;

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    // gallery
require __DIR__.'/auth.php';

Route::get('lang/{lang}' , function(string $lang) {
    session()->put('lang',$lang);
    return back();
});

Route::view('/', 'main')->middleware('lang');
Route::get('logInEmployee', [EmployeeController::class ,'logInEmployeePage'])->name('login.employee.Page')->middleware('lang');
Route::post('logInEmployee', [EmployeeController::class ,'logInEmployeeCheck'])->name('login.employee.check')->middleware('lang');

Route::prefix('dashboard')->middleware('lang')->group(function (){
    Route::get('/user/{user}', [UserController::class,'show'])->name("user_profile")->middleware(['auth', 'verified']);
    Route::view('/projects/{project}/addManger', 'employees.addManger')->name("add.manger")->middleware(['auth', 'verified']);
    Route::get('/user/{user}/edit', [UserController::class,'edit'])->name("edit_profile")->middleware(['auth', 'verified']);
    Route::get('/tasks/{task}/employee/{employee}', [TaskController::class ,'removeEmployee'])->name('removeEmployeeFromTask');
    Route::get('/employee/{employee}', [EmployeeController::class,'profile'])->name('employee.profile');
    Route::get('/', dashboardController::class)->name('dashboard')->middleware(['auth', 'verified']);
    Route::get('/projects/{project}/records', [ProjectController::class ,'allRecords'])->name('projects.records');
    Route::resource('/projects', ProjectController::class);
    Route::resource('/project.employees', EmployeeController::class);
    Route::resource('/project.tasks', TaskController::class);
    Route::resource('job_titles', JobTitleController::class);
});







