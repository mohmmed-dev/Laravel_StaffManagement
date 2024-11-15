<div class="">
    {{-- Care about people's approval and you will be their prisoner. --}}
        @forelse ($employee->Records as $record)
        <div class=" bg-zinc-50 rounded-md px-1 py-2 ">
            <h4 class="mb-2">{{'@' . $employee->username}}</h4>
            <div class="border-t-2 pt-1">
                {{-- <span class="p-1 ltr:border-r-2 rtl:border-r-2 ">{{$record->pivot->created_at->isoFormat('h:mm')}}</span> --}}
                <span class="p-1 uppercase">{{$record->pivot->status}}</span>
            </div>
        </div>
        @empty

        @endforelse
</div>
