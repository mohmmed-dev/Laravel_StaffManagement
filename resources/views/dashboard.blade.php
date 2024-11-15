<x-app-layout>
    <div class="md:grid grid-cols-12 gap-2 justify-center my-2 bg-neutral-200 sm:bg-transparent ">
        {{-- Start Projects --}}
        <div class="col-start-2 col-end-7 col-span-5 my-1 bg-neutral-200 rounded-sm">
            <div class=" px-2 py-3 shadow-sm rounded-t-sm ">
                <a href="{{route('projects.create')}}" class="w-fit shadow-md border-1 p-2 rounded-md bg-neutral-50 ">{{__("Add New Project")}} +</a>
            </div>
            <h2 class="px-2 py-3 text-2xl ">{{__('Projects')}}</h2>
                @livewire('BoxProjects',['projects' => $projects])
        </div>
        {{-- End Projects --}}
        {{-- Start employees --}}
        <div class="col-start-7  col-strat-6 col-span-5 bg-neutral-200 rounded-sm">
            <h2 class="px-2 py-3 text-2xl ">{{__('Employees')}}</h2>
                @foreach ($projects as $project)
                    @livewire('BoxEmployees',['project' => $project])
                @endforeach
        </div>
        {{-- End employees --}}
    </div>
</x-app-layout>
