<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function __invoke()
    {
        $projects = auth()->user()->Projects;
        return view('dashboard',compact('projects'));
    }
}
