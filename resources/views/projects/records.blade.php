<x-app-layout>
    <div class="md:grid overflow-hidden grid-cols-12  h-fit  py-2 bg-neutral-200 sm:bg-transparentrounded-sm ">
        <div class="col-span-8 col-start-3 ">
            {{-- Start Project --}}
            <div class="shadow-md m-1 border-1 justify-between  p-2 rounded-md bg-neutral-50 relative">
                <span class="absolute top-50  rtl:left-10 ltr:right-10 p-1 shadow-sm text-xs text-white uppercase bg-slate-500 border-1 rounded-sm bg-neutral-5">{{__($project->type)}}</span>
                <h3 class=" text-xl">{{ $project->name}}</h3>
            </div>
            {{-- End Project --}}
        </div>
        {{-- Start Records--}}
        <div class="col-span-8 col-start-3">
            @livewire('records', ['project' => $project], key(auth()->user()->id))
        </div>
        {{-- End Records--}}
    </div>
</x-app-layout>
