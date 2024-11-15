<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    @foreach ($project->Employees as $employee)
    <div class="shadow-md border-1 p-2 m-1 cursor-pointer rounded-md bg-neutral-50 relative flex items-center" wire:click="away({{$project}},{{$employee}})">
        <div class="absolute  top-1 rounded-sm  rtl:left-1 ltr:right-1 text-xs text-white uppercase flex items-center gap-x-1 bg-neutral-5 w-fit h-fit">
            @livewire('employee-status', ['employeeStatus' => $employee->checkToDay($project->Record)])
            @if($employee->JobTitles($project))
            <span class=" shadow-sm bg-slate-500 rounded-sm p-1 ">{{$employee->JobTitles($project)}}</span>
            @endif
        </div>
        <div class="w-12 h-12 rounded-full shadow-sm bg-slate-950 overflow-hidden ">
            <img src="{{$employee->image()}}" class="w-full h-full" alt="">
        </div>
        <div class="mx-3">
            <p>{{$employee->name}}</p>
            <p>{{"@".$employee->username}}</p>
        </div>
        {{-- <p>{{$project->description}}</p> --}}
    </div>
    @endforeach
</div>
