<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    @foreach ($projects as $project)
    <div class="shadow-md cursor-pointer border-1 p-2 m-1  rounded-md bg-neutral-50 relative"  wire:click="away({{$project->id}})">
        <span class="absolute top-0 rtl:left-0 ltr:right-0 p-1 shadow-sm text-xs text-white uppercase bg-slate-500 border-1 rounded-sm bg-neutral-5">{{__($project->type)}}</span>
        <h3 class="mb-2 text-xl">{{$project->name}}</h3>
        <p>{{$project->description}}</p>
    </div>
    @endforeach
</div>
