<x-app-layout>
    <div class="sm:flex gap-1  overflow-hidden flex-wrap flex-row h-full justify-center py-2 bg-neutral-200 sm:bg-transparentrounded-sm ">
        {{-- Start Projects --}}
        @forelse ($projects as $project)
        <div class="shadow-md m-1 border-1 flex flex-col justify-between overflow-hidden p-2 md:basis-1/4 w-full lg:basis-1/4 rounded-md bg-neutral-50 relative" >
            <span class="absolute top-0 rtl:left-0 ltr:right-0 p-1 shadow-sm text-xs text-white uppercase bg-slate-500 border-1 rounded-sm bg-neutral-5">{{__($project->type)}}</span>
            <h3 class="mb-2 text-xl">{{$project->name}}</h3>
            <p>{{Str::limit($project->description,30)}}</p>
            <div class="flex gap-1 overflow-x-auto w-fit mt-3 ">
                @forelse ($project->Employees as $employee)
                <a href="{{route("project.employees.show",[$project->id,$employee->id])}}" class="w-9 h-9 rounded-full shadow-sm bg-slate-950">
                    <img src="" alt="">
                </a>
                @empty

                @endforelse
            </div>
        </div>
        @empty
        <div class="m-auto p-2 bg-slate-200">{{__("Is Empty")}}</div>
        @endforelse
        {{-- Ends Projects --}}
    </div>
</x-app-layout>
