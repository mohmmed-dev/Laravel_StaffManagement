<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\employee_job_title;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate as FacadesGate;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        FacadesGate::authorize('update_manger',$project);
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Project $project,Employee $employee)
    {
        FacadesGate::authorize('update_manger',$project);
        $data = $request->validate([
            'name' => 'required',
            'username' => 'required|alpha_dash',
            'image' => 'nullable|mimes:jpg,png',
            'key' => 'required|alpha_dash|min:8',
            'age' => 'required|numeric',
            'salary' => 'required|numeric',
            "nationality" => 'required|alpha_dash'
        ]);
        if($request->hasFile('image')) {
            $path = $request->file('image')->store('employees','public');
            $data['image'] = '/'.$path;
        } else {
        $data['image'] = "https://ui-avatars.com/api/?name=".urlencode($data['name']);
        }
        $employee = $employee->create($data);
        $project->addEmployee($employee);
        employee_job_title::create([
            'employee_id' => $employee->id,
            'project_id' => $project->id,
            'job_title_id' => session("id")
        ]);
        return redirect()->route('projects.show',$project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project,Employee $employee)
    {
        FacadesGate::authorize('show_team',$project);
        return view('employees.employee',compact('employee','project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, Employee $employee)
    {
        FacadesGate::authorize('update_manger',$project);
        return view('employees.update',compact('employee','project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Project $project, Employee $employee)
    {
        FacadesGate::authorize('update_manger',$project);
        $data = $request->validate([
            'name' => 'required',
            'image' => 'nullable|mimes:jpg,png',
            'age' => 'required|numeric',
            'salary' => 'required|numeric',
            "nationality" => 'required|alpha_dash'
        ]);

        if($request->hasFile("image")) {
            $path = $request->file('image')->store('employees','public');
            $data['image'] = '/'.$path;
        }
        if($employee->username !== $request->username ) {
            $request->validate([
                'username' => 'required|alpha_dash',
            ]);
            $data['username'] = $request->key;
        }
        if($request->filled('key')) {
            $request->validate([
                'key' => 'required|alpha_dash|min:8',
            ]);
            $data['key'] = $request->key;
        }
        if($request->hasFile('image')) {
        } else {
        $data['image'] = "https://ui-avatars.com/api/?name=".urlencode($data['name']);
        }
        $employee = $employee->update($data);
        return redirect()->route('project.employees.show',[$project,$employee]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project,Employee $employee)
    {
        FacadesGate::authorize('update_manger',$project);
    }

    public function logInEmployeePage() {
        // if(session()->has('employee_id')) {
        //     // session()->forget('employee_id');
        //     dump(session('employee_id'));
        // }
        return view('employees.login');
    }
    public function logInEmployeeCheck(Request $request) {
        if(session()->has('employee_id')) {
            session()->forget('employee_id');
        }
        $data = $request->validate([
            'employeename' => 'required',
            'key' => 'required'
        ]);
        $employee = Employee::where('username',$data['employeename'])->first();
        if(!empty($employee) && ($data['key'] === $employee->key)) {
            session(['employee_id' =>  $employee->id]);
        return redirect()->route('employee.profile',$employee->id);
        }
    }

    public function profile(Employee $employee) {
        return view('employees.employee',compact('employee'));
    }
}
