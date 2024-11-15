<div class="w-fit inline-block shadow-sm border-1 rounded-sm bg-neutral-5 overflow-hidden">
    {{-- In work, do what you enjoy. --}}
    @switch($status)
        @case('works')
            <span class="bg-blue-500 p-1">{{__($status)}}</span>
            @break
            @case('waiting')
            <span class="bg-yellow-500 p-1">{{__($status)}}</span>
            @break
            @case('canceled')
            <span class="bg-red-500 p-1">{{__($status)}}</span>
            @break
            @case('finish')
            <span class="bg-green-500 p-1 ">{{__($status)}}</span>
            @break
        @default
    @endswitch
</div>
