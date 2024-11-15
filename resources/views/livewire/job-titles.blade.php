<div class="w-fit max-w-60 bg-neutral-300 rounded-sm">
    {{-- Success is as dangerous as failure. --}}
    <div class="flexi tems-center">
        <input  class="bg-gray-50 border h-6  inline-block border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 " type="text" name="title" wire:model="search" >
        <div wire:click="searchData" class="bg-blue-500 border w-fit inline-block border-blue-300   text-white  text-sm px-1 rounded-lg focus:ring-blue-500 focus:border-blue-500">{{__("Sarch")}}</div>
    </div>
    <ul class="overflow-auto max-h-28 min-h-20 flex gap-1 p-2 flex-wrap">
    @forelse ($this->showJobs() as $job)
    <li class="bg-blue-400 text-sm text-white rounded-lg cursor-pointer w-fit h-fit px-2 py-1" wire:click="take({{$job->id}})">{{$job->name}}</li>
    @empty
    <div>{{__('Is Empty')}}</div>
    @endforelse
    </ul>
    <div class="flexi tems-center" wire:submit="create">
        <input  class="bg-gray-50 border h-6  inline-block border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 " type="text" name="title" wire:model="title" >
        <div wire:click="create" class="bg-blue-500 border w-fit inline-block border-blue-300   text-white px-1 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500">{{__("Add")}}</div>
    </div>
</div>
