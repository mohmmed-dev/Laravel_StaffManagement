<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Project;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Illuminate\Routing\Controllers\hasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        FacadesGate::authorize('create_manger');
        $projects = auth()->user()->Projects;
        return view('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required|max:100',
            'key' => 'required|alpha_dash|min:8',
            'type' => 'required',
        ]);
        $project =  Project::create($data);
        auth()->user()->projects()->attach($project->id,['isManger'=> 1]);
        Record::create([
            'project_id' => $project->id
        ]);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        FacadesGate::authorize('show_team',$project);
        return view("projects.project",compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        FacadesGate::authorize('update_manger',$project);
        return view('projects.update' ,compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project,Record $record)
    {
        FacadesGate::authorize('update_manger',$project);
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required:max:100',
            'type' => 'required',
        ]);

        if($request->filled('key')){
            $data['key'] = $request->validate(['key' => 'required|alpha_dash|min:8']);
        }
        $project->update(
            $data
        );
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project,string $id)
    {
        FacadesGate::authorize('update_manger',$project);
        //
    }

    public function allRecords(Project $project) {
        $records = $project->Record;
        return view('projects.records',compact('project','records'));
    }
}
