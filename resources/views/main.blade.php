@extends('layouts.start')
@section('content')
    <a href="{{route('login')}}" class=" text-center px-3 py-4 w-full bg-white hover:shadow-md shadow-sm overflow-hidden sm:rounded-lg">
        <div>
            {{__("Login")}}
        </div>
    </a>
    <a href="{{route('register')}}" class=" text-center px-3 w-full  py-4 bg-white hover:shadow-md shadow-sm overflow-hidden sm:rounded-lg">
        <div>
            {{__("Register")}}
        </div>
    </a>
    <a href="{{route('login.employee.Page')}}" class=" text-center px-3 w-full py-4 bg-white hover:shadow-md shadow-sm overflow-hidden sm:rounded-lg">
        <div>
            {{__("Employee")}}
        </div>
    </a>
@endsection

