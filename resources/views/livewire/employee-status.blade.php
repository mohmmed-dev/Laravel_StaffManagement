<div class="w-fit shadow-sm  rounded-sm inline-block overflow-hidden">
    {{-- Stop trying to control. --}}
    @forelse ($employeeStatus as $employee)
        @switch($employee->status)
        @case('exists')
            <span class="bg-blue-500 p-1">{{__($employee->status)}}</span>
            @break
            @case('absent')
            <span class="bg-yellow-500 p-1">{{__($employee->status)}}</span>
            @break
            @case('sick')
            <span class="bg-red-500 p-1">{{__($employee->status)}}</span>
            @break
            @case('vacation')
            <span class="bg-green-500 p-1 ">{{__($employee->status)}}</span>
            @break
        @default
    @endswitch
    @empty

    @endforelse
</div>
