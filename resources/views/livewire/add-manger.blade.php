<div class="md:grid grid-cols-12 gap-2 justify-center mt-2 mb-4 bg-neutral-200 sm:bg-transparent">
    <div class="col-start-3 col-span-8 mt-2 py-2 bg-neutral-200 rounded-sm">
        {{-- Because she competes with no one, no one can compete with her. --}}
        <div class="mt-5 ">
        <label for="default-search" class="mb-2 text-sm font-medium bg-slate-900 sr-only">Search</label>
        <div class="relative max-w-80 mx-auto">
        <input wire:model.live="searchInput" type="search"  class="block w-full p-4 text-sm  border border-gray-300 rounded-lg bg-gray-50 focus:ring-gray-500 focus:border-slate-900 " name="term" id="term" placeholder="{{__('Search About...')}}" />
        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-4 py-2 ">{{__('Search')}}</button>
        </div>
            <div class="border-t border-2 my-3"></div>
        </div>
        {{-- Start Manger --}}
        @if (!empty($results) && !empty($searchInput) )
        <div class="overflow-y-auto max-h-72">
            @foreach ($results as $user)
            <div class="shadow-md border-1 p-2 m-1 max-w-96 mx-auto  rounded-md bg-neutral-50 relative flex items-center justify-between">
            <a class="flex items-center" href="{{route('user_profile' , $user->id)}}" >
                    <div class="w-12 h-12 rounded-full shadow-sm bg-slate-950 overflow-hidden ">
                    <img src="{{$user->image}}" class="w-full h-full" alt="{{$user->username}}">
                </div>
                <div class="mx-3">
                    <p>{{$user->name}}</p>
                    <p>{{"@".$user->username}}</p>
                </div>
                </a>
                {{$user->isManger($project)}}
                <div class="p-2 {{ !$user->isManger($project) ? 'bg-blue-500  cursor-pointer': 'bg-slate-500 cursor-text'}} rounded-lg text-white" wire:click='addNewManger({{$user->id}})'> {{__("Add")}} </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-xl my-4 text-center">{{__("Is Empty")}}</div>
        @endif
        {{-- End Manger  --}}
    </div>
</div>
