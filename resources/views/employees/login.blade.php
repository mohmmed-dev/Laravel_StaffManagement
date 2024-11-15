
@extends('layouts.start')
@section('content')

<div class="w-full">
    <form action="{{route('login.employee.check')}}" method="POST">
        @csrf
        <!-- Employee Name -->
        <div class="mb-6">
            <label for="employeename" class="block mb-2 text-sm font-medium text-gray-900 ">{{__('Employee Name')}}</label>
            <input type="text"  id="employeename" name="employeename" value="{{old('employeename')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 " />
            @error('employeename')
                <div class="text-red-500">
                    {{$message}}
                </div>
            @enderror
        </div>
        <!-- Kay -->
        <div class="mb-6">
            <label for="key" class="block mb-2 text-sm font-medium text-gray-900 ">{{__('Key')}}</label>
            <input type="text" id="key" name="key" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 "/>
            @error('key')
                <div class="text-red-500">
                    {{$message}}
                </div>
            @enderror
        </div>
            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</div>

@endsection
