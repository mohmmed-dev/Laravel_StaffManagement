<x-app-layout>
    <div class="md:grid overflow-hidden grid-cols-12 min-h-screen  py-2 bg-neutral-200 sm:bg-transparentrounded-sm ">
        {{-- Start Info --}}
        <div class="col-span-4 col-start-3 row-span-4 row-start-1 ">
            {{-- Start Project --}}
            <h3 class="m-1 w-fit text-xl border-b-2 border-y-gray-500 rounded-sm">{{__('Details')}}</h3>
            <div class="shadow-md m-1 border-1 justify-between  p-2 rounded-md bg-neutral-50 relative">
                <span class="absolute top-0 rtl:left-0 ltr:right-0 p-1 shadow-sm text-xs text-white uppercase bg-slate-500 border-1 rounded-sm bg-neutral-5">{{__($project->type)}}</span>
                <h3 class="mb-2 text-xl">{{__("Name") .': '. $project->name}}</h3>
                <h3 class="mb-2 text-xl">{{__('Description')}}</h3>
                <p>{{$project->description}}</p>
            </div>
            @can('update_manger', $project)
                <div class="flex items-center gap-x-1">
                    @can('user_manger', $project)
                    <a href="{{route('projects.edit', $project->id)}}" class="p-2   bg-blue-500 rounded-lg text-white">{{__("Edit")}}</a>
                    <a href="{{route('add.manger', $project->id)}}" class="w-fit my-3 flex shadow-md border-1 p-2 rounded-md bg-neutral-50 ">{{__("Add Manger")}} +</a>
                    @endcan
                    <a href="{{route('projects.records', $project->id)}}" class="w-fit my-3 flex shadow-md border-1 p-2 rounded-md bg-neutral-50 ">{{__("Records")}}</a>
                </div>
            @endcan
            @livewire('employees-recored', ['project' => $project])
            {{-- End Project --}}
            <h3 class="m-1 w-fit text-xl border-b-2 border-y-gray-500 rounded-sm">{{__('Manger')}}</h3>
            {{-- Start Manger --}}
            <div class="overflow-y-auto max-h-60">
                @foreach ($project->users as $User)
                <a class="shadow-md border-1 p-2 m-1  rounded-md bg-neutral-50 relative flex items-center" href="{{route('user_profile' , $User->id)}}">
                    @if($User->isSuperManger($project->id))
                    <div class="{{$User->isSuperManger($project->id) ? "" : "none" }} w-4 h-4 rounded-full bg-amber-500 absolute top-3 rtl:left-2 ltr:right-2">{{-- ltr:left-3 rtl:right-3--}}</div>
                    @endif
                    <div class="w-12 h-12 rounded-full shadow-sm bg-slate-950 overflow-hidden ">
                        <img src="{{$User->image()}}" class="w-full h-full" alt="{{$User->username}}">
                    </div>
                    <div class="mx-3">
                        <p>{{$User->name}}</p>
                        <p>{{"@".$User->username}}</p>
                    </div>
                </a>
                @endforeach
            </div>
            {{-- End Manger --}}
        </div>
        {{-- End Info --}}
        {{-- Start Employees --}}
        <div class="col-span-4 col-start-7 row-span-6 row-start-1">
            <h3 class="m-1 w-fit text-xl border-b-2 border-y-gray-500 rounded-sm">{{__('Employees')}}</h3>
            @can('update_manger', $project)
                <a href="{{route('project.employees.create', $project->id)}}" class="w-fit my-3 flex shadow-md border-1 p-2 rounded-md bg-neutral-50 ">{{__("Add Employee")}} +</a>
            @endcan
            <div class=" overflow-y-auto max-h-96">
                @livewire('BoxEmployees',['project' => $project])
        </div>
        {{-- End Employees --}}
        {{-- Start Tasks --}}
        <div class="col-span-4 col-start-3 row-span-4 row-start-5">
            <h3 class="m-1 w-fit text-xl border-b-2 border-y-gray-500 rounded-sm">{{__('Tasks')}}</h3>
            @can('update_manger', $project)
                <a href="{{route('project.tasks.create', $project->id)}}" class="w-fit my-3 flex shadow-md border-1 p-2 rounded-md bg-neutral-50 ">{{__("Add Task")}} +</a>
            @endcan
            <div class=" overflow-y-auto max-h-96">
                @forelse ($project->tasks as $task)
                    <div class="shadow-md border-1 p-2 m-1 rounded-md bg-neutral-50 relative flex items-center">
                        <div class="absolute top-0  rtl:left-0 ltr:right-0 p-1 text-md text-white uppercase">
                            @livewire('status-task', ['status' => $task->status])
                            @livewire('type-task', ['type' => $task->type])
                        </div>
                        <a href="{{route('project.tasks.show',[$project->id,$task->id])}}" class="mx-3">
                            <p>{{__("Title"). ": " .$task->title}}</p>
                            <p>{{__("Description"). ": " .Str::limit($task->description,30)}}</p>
                        </a>
                    </div>
                @empty
            </div>
            <div class="m-auto p-2 bg-slate-200">{{__("Is Empty")}}</div>
            @endforelse
        </div>
        {{-- End Task --}}
    </div>
</x-app-layout>
