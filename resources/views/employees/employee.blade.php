<x-app-layout>
    <div class="md:grid overflow-hidden grid-cols-12 h-fit  py-2 bg-neutral-200 sm:bg-transparentrounded-sm ">
        {{-- Start Info --}}
        <div class="col-span-4 col-start-3 ">
            {{-- Start Employee --}}
            <h3 class="m-1 w-fit text-xl border-b-2 border-y-gray-500 rounded-sm">{{__('Profile')}}</h3>
            <div class="shadow-md m-1 border-1 justify-between  p-2 rounded-md bg-neutral-50 relative">
                <div class="flex items-center">
                    <img class="h-20 w-20 rounded-full" src="{{$employee->image()}}" alt="{{$employee->username}}">
                    <h3 class="text-xl mx-2">{{'@'.$employee->username}}</h3>
                </div>
                <div>
                    <h3 class="mb-2 text-xl">{{__("Name: ").$employee->username}}</h3>
                    <h3 class="mb-2 text-xl">{{__('Age: ').$employee->age}}</h3>
                    <h3 class="mb-2 text-xl">{{__('Nationality: ').$employee->nationality}}</h3>
                    @can(false, $employee)
                        <h3 class="mb-2 text-xl">{{__('Salary: ').$employee->salary}}</h3>
                    @endcan
                </div>
                @can('update_manger', ($project ?? null))
                <div>
                    <a href="{{Route('project.employees.edit',[$project->id,$employee->id])}}" class="px-4 py-1  bg-blue-500 rounded-lg text-white">{{__('Edit')}}</a>
                </div>
                @endcan
            </div>
            {{-- End Employee --}}
            <h3 class="m-1 w-fit text-xl border-b-2 border-y-gray-500 rounded-sm">{{__('Works In')}}</h3>
            {{-- Start Project --}}
            <div class="overflow-y-auto max-h-64">
                <div class="shadow-md border-1 p-2 m-1  rounded-md bg-neutral-50">
                @livewire('BoxProjects',['projects' => $employee->Projects])
                </div>
            </div>
            {{-- End Project --}}
        </div>
        {{-- End Info --}}
        {{-- End Employees --}}
        {{-- Start Tasks --}}
        <div class="col-span-4 col-start-7 ">
            <h3 class="m-1 w-fit text-xl border-b-2 border-y-gray-500 rounded-sm">{{__('Tasks')}}</h3>
            <div class=" overflow-y-auto max-h-96">
                @forelse ($employee->tasks as $task)
                    <div class="shadow-md border-1 p-2 m-1 rounded-md bg-neutral-50 relative flex items-center">
                            <div class="absolute top-0 rtl:left-0 ltr:right-0 p-1 text-md text-white uppercase">
                                @livewire('status-task', ['status' => $task->status])
                                @livewire('type-task', ['type' => $task->type])
                            </div>
                            <a href="{{route('project.tasks.show',[$task->project->id,$task->id])}}" class="mx-3">
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
