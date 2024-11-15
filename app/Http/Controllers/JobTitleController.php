<?php

namespace App\Http\Controllers;

use App\Models\job_title;
use Illuminate\Http\Request;

class JobTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $job_title = job_title::paginate(20);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->validate(['name'=>'required|alpha_dash']);
        job_title::create($name);
    }

    /**
     * Display the specified resource.
     */
    public function show(job_title $job_title)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(job_title $job_title)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, job_title $job_title)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(job_title $job_title)
    {
        //
    }
}
