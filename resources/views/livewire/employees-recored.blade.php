<div class="m-2">
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    @empty ($this->isNotRecord())
    <div class="w-fit flex shadow-md border-1 px-2 py-1  rounded-md bg-blue-500 text-white cursor-pointer uppercase" wire:click="recordMe">{{__("i am here")}}</div>
    @endempty
</div>
