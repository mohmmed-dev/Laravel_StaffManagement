    <div class="w-fit inline-block shadow-sm border-1 rounded-sm bg-neutral-5 overflow-hidden">
    {{-- Do your work, then step back. --}}
    @switch($type)
        @case('urgent')
            <span class="bg-red-800 p-1">{{__($type)}}</span>
            @break
            @case('notUrgent')
            <span class="bg-blue-800 p-1">{{__($type)}}</span>
            @break
            @case('important')
            <span class="bg-gray-800 p-1">{{__($type)}}</span>
            @break
        @default
    @endswitch
</div>
