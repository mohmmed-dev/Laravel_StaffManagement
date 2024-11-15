<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <form >
    @if ($employee->iAMWorking->count())
        <button class="w-4 h-4 bg-red-500 rounded-full inline-block m-1" wire:click='stop()'></button>
        @else
        <button class="w-4 h-4 bg-blue-500 rounded-full inline-block m-1" wire:click='start()'></button>
    @endif
    </form>
</div>
