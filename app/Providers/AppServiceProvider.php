<?php

namespace App\Providers;

use App\Models\Employee;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use App\Services\Auth\JwtGuard;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('update_manger', function(User $user,Project $project) {
            return $project->Users()->where('user_id',$user->id)->exists();
        });
        Gate::define('update_user', function(User $user,User $secondUser) {
            return $secondUser->id == $user->id;
        });
        Gate::define('work_task', function(?User $user,Task $task) {
            $employee = session("employee_id") ?? null;
            return  $task->IsWorkHereID($employee);
        });
        Gate::define('user_manger', function(User $user,Project $project) {
            return  $project->Users()->where('user_id',$user->id)->where('isManger',1)->exists();
        });
        Gate::define('create_manger', function(User $user) {
            return  auth()->check();
        });
        Gate::define('show_team', function(?User $user,Project $project) {
            $employee = Employee::employee_auth(session("employee_id"));
            return $project->Users()->where('user_id',optional($user)->id)->exists() || $project->isMyEmployee($employee);
        });
    }
}
