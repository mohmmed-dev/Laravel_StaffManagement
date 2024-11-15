<x-app-layout>
    <div class="md:grid overflow-hidden min-h-screen grid-cols-12 h-fit py-2 bg-neutral-200 sm:bg-transparentrounded-sm ">
        {{-- Start Info --}}
        <div class="col-span-8 col-start-3">
            {{-- Start Project --}}
            <h3 class="m-1 w-fit text-xl border-b-2 border-y-gray-500 rounded-sm">{{__('Details')}}</h3>
            <div class="shadow-md m-1 border-1 justify-between  p-2 rounded-md bg-neutral-50 relative ">
                <div class="absolute top-0  rtl:left-0 ltr:right-0 p-1 text-md text-white uppercase flex items-center gap-x-1">
                @livewire('work-task', ['tasks' => $task->workNow])
                @livewire('status-task', ['status' => $task->status])
                @livewire('type-task', ['type' => $task->type])
                </div>
                <h3 class="mb-2 text-xl">{{__("Name") . ': ' . $task->title}}</h3>
                <h3 class="mb-2 text-xl">{{__('Description')}}</h3>
                <p>{{$task->description}}</p>
            </div>
            <div class="flex items-center relative">
                @can('update_manger',$task->Project)
                <form action="{{route('project.tasks.update',[$task->Project->id,$task->id])}}" method="POST" class="p-2">
                    @method('PATCH')
                    @csrf
                    <div class="flex gap-2 items-center">
                        <div class="w-fit" >
                            <select onchange="this.form.submit()" class="block w-full p-2 mb-1 text-sm text-gray-900 border border-gray-900 rounded-lg bg-gray-50 focus:ring-gray-900 focus:border-gray-900 px-4" name="status">
                            <option disabled @selected((old('status') ?? $task['status']) == null)>{{__("Status")}}</option>
                                <option value="works" class="uppercase"   @selected((old('status') ?? $task['status']) == 'works')>{{__('works')}}</option>
                                <option value="finish"  class="uppercase"  @selected((old('status') ?? $task['status']) == 'finish')>{{__('finish')}}</option>
                                <option value="waiting"  class="uppercase"  @selected((old('status') ?? $task['status']) == 'waiting')>{{__('waiting')}}</option>
                                <option value="canceled"  class="uppercase" @selected((old('status') ?? $task['status']) == 'canceled')>{{__('canceled')}}</option>
                            </select>
                            @error('status')
                            <span class="text-md text-red-500 my-2">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="w-fit">
                            <select  onchange="this.form.submit()" class="block w-full p-2 mb-1 text-sm text-gray-900 border border-gray-900 rounded-lg bg-gray-50 focus:ring-gray-900 focus:border-gray-900 px-4" name="type">
                            <option disabled  @selected((old('type') ?? $task['type']) == null)>{{__("Type")}}</option>
                                <option value="urgent"   class="uppercase"  @selected((old('type') ?? $task['type']) == 'urgent')>{{__('urgent')}}</option>
                                <option value="noturgent"  class="uppercase"   @selected((old('type') ?? $task['type']) == 'noturgent')>{{__('not urgent')}}</option>
                                <option value="important"  class="uppercase"   @selected((old('type') ?? $task['type']) == 'important')>{{__('important')}}</option>
                            </select>
                            @error('type')
                            <span class="text-md text-red-500 my-2">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </form>
                <a href="{{Route('project.tasks.edit',[$task->Project->id,$task->id])}}" class="px-4 py-1  bg-blue-500 rounded-lg text-white">{{__('Edit')}}</a>
                    @endcan
                @can('work_task',$task)
                <div class="absolute top-0  rtl:left-0 ltr:right-0 p-1 text-md text-white uppercase flex items-center gap-x-1">
                    @livewire('start-work', ['task' => $task])
                </div>
                @endcan
            </div>
        </div>
        {{-- End Info --}}
        {{-- Start Project --}}
        <div class="col-span-4 col-start-3">
            <h3 class="m-1 w-fit text-xl border-b-2 border-y-gray-500 rounded-sm">{{__('Project')}}</h3>
            <div class="overflow-y-auto max-h-72">
                <div class="shadow-md border-1 p-2 m-1  rounded-md bg-neutral-50">
                    <a href="{{route('projects.show',$task->Project->id)}}" class=" block shadow-md border-1 p-2 m-1  rounded-md bg-neutral-50 relative"  >
                        <span class="absolute top-0 rtl:left-0 ltr:right-0 p-1 shadow-sm text-xs text-white uppercase bg-slate-500 border-1 rounded-sm bg-neutral-5">{{__($task->Project->type)}}</span>
                        <h3 class="mb-2 text-xl">{{$task->Project->name}}</h3>
                        <p>{{$task->Project->description}}</p>
                    </a>
                </div>
            </div>
        </div>
        {{-- End Project --}}
        {{-- Start Employees --}}
        <div class="col-span-4 col-start-7">
            <h3 class="m-1 w-fit text-xl border-b-2 border-y-gray-500 rounded-sm">{{__('Employees')}}</h3>
                <div class=" overflow-y-auto max-h-72">
                @forelse ($task->Employees as $employee)
                    <div class="shadow-md border-1 p-2 m-1 rounded-md bg-neutral-50 relative flex items-center justify-between">
                        <a href="{{route('project.employees.show',[$task->project->id,$employee->id])}}" class="  flex items-center">
                        <div class="absolute top-0   rtl:right-0  p-1 text-md text-white uppercase flex items-center gap-x-1">
                            @livewire('user-work', ['work' => $employee->iAMWorking])
                        </div>
                        <div class="w-12 h-12 rounded-full shadow-sm bg-slate-950 overflow-hidden ">
                                <img src="{{$employee->image()}}" class="w-full h-full" alt="{{$employee->username}}">
                            </div>
                            <div class="mx-3">
                                <p>{{$employee->name}}</p>
                                <p>{{"@".$employee->username}}</p>
                            </div>
                        </a>
                            @can('update_manger',$task->Project)
                            <a href="{{route('removeEmployeeFromTask',[$task->id,$employee->id])}}" class="px-2 py-1 text-sm w-fit  bg-red-500 rounded-lg text-white cursor-pointer">{{__('Remove')}}</a>
                            @endcan
                    </div>
                @empty
            </div>
            <div class="m-auto p-2 bg-slate-200">{{__("Is Empty")}}</div>
            @endforelse
        </div>
        {{-- End Employees --}}
    </div>
</x-app-layout>
