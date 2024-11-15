<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Pest\Arch\ValueObjects\Violation;
use Illuminate\Support\Facades\Gate as FacadesGate;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        FacadesGate::authorize('update_manger',$project);
        return view('tasks.create',compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Project $project,Task $task)
    {
        FacadesGate::authorize('update_manger',$project);
        $data = $request->validate([
            'title' => 'alpha_num|max:40|required',
            'description' => 'required',
            'status' => 'nullable',
            'type' => 'nullable',
        ]);
        $data['project_id'] = $project->id;
        $task = $task::create($data);
        if($request->employees) {
            foreach($request->employees as $employee) {
                $task->addEmployeeToTask($employee);
            };
        }
        return redirect()->route('projects.show',$project->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project,Task $task)
    {
        FacadesGate::authorize('show_team',$project);
        return view('tasks.task',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project,Task $task)
    {
        FacadesGate::authorize('update_manger',$project);
        return view('tasks.update',compact('project','task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Project $project, Task $task)
    {
        FacadesGate::authorize('show_team',$project);
        $data = $request->validate([
            'title' => 'sometimes|alpha_num|max:40|required',
            'description' => 'sometimes|required',
            'status' => 'sometimes|nullable',
            'type' => 'sometimes|nullable',
        ]);
        $task->update($data);
        if($request->employees) {
            foreach($request->employees as $id) {
                if(!$task->IsWorkHereID($id)) {
                $task->addEmployeeToTask($id);
                }
            };
        }
        return redirect()->route('project.tasks.show',[ $project->id,$task->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, Task $task)
    {
        $task->delete();
        return redirect()->route('projects.show',$project->id);
    }

    public function removeEmployee(Task $task,Employee $employee){
        $task->removeEmployeeFromTask($employee->id);
        return back();
    }
}
