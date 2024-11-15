<x-app-layout>
    <div class="md:grid overflow-hidden grid-cols-12 h-fit  py-2 bg-neutral-200 sm:bg-transparentrounded-sm ">
        {{-- Start Info --}}
        <div class="col-span-8 col-start-3">
            <h3 class="m-1 w-fit text-xl border-b-2 border-y-gray-500 rounded-sm ">{{__('Profile')}}</h3>
            <div class=" md:flex flex-row  items-start">
                {{-- Start Employee --}}
                <div class="shadow-md m-1 border-1 gap-x-2  p-2 rounded-md bg-neutral-50 relative  items-center w-50 flex md:basis-2/4 ">
                    @can('update_user', $user)
                    <div class=" absolute bottom-2  rtl:left-2 ltr:right-2 ">
                        <a href="{{Route('edit_profile',$user->id)}}" class="px-4 py-1  bg-blue-500 rounded-lg text-white">{{__('Edit')}}</a>
                    </div>
                    @endcan
                    <div class="flex items-center gap-x-2 ">
                        <img class="h-20 w-20 rounded-full" src="{{$user->image()}}" alt="{{$user->username}}">
                        <div>
                            <h3 class="text-sm ">{{'@'.$user->username}}</h3>
                            <h3 class=" text-xl">{{__("Name: ").$user->name}}</h3>
                        </div>
                    </div>
                </div>
                {{-- Start Project --}}
                <div class="overflow-y-auto max-h-80  md:basis-2/4">
                    <div class="shadow-md border-1 p-2 m-1  rounded-md bg-neutral-50">
                    @livewire('BoxProjects',['projects' => $user->Projects])
                    </div>
                </div>
                {{-- End Project --}}
            </div>
        </div>
        {{-- End Info --}}
    </div>
</x-app-layout>
