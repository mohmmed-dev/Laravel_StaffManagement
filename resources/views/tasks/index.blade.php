<x-app-layout>
    <div class="sm:flex gap-1  overflow-hidden flex-wrap flex-row h-full justify-center py-2 bg-neutral-200 sm:bg-transparentrounded-sm ">
        {{-- Start Employees --}}
        @forelse ($employees as $employee)
        <div class="shadow-md m-1 border-1 flex gap-x-1 items-center overflow-hidden p-2 md:basis-1/4 w-full lg:basis-1/4 rounded-md bg-neutral-50 relative">
            {{-- <span class="absolute top-0 rtl:left-0 right-0 p-1 shadow-sm text-xs text-white uppercase bg-slate-500 border-1 rounded-sm bg-neutral-5">{{$project->type}}</span> --}}
            <div class="w-12 h-12 rounded-full shadow-sm bg-slate-950 overflow-hidden ">
                <img src="{{$employee->image}}" class="w-full h-full" alt="">
            </div>
            <div>
                <h3 class="text-xl">{{$employee->name}}</h3>
            </div>
        </div>
        @empty
        <div class="m-auto p-2 bg-slate-200">{{__("Is Empty")}}</div>
        @endforelse
        {{-- Ends Employees --}}
    </div>
</x-app-layout>
