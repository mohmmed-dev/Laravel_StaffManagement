<div class="w-fit inline-flex justify-center items-center shadow-sm border-1 rounded-sm bg-neutral-5 overflow-hidden ">
    {{-- Do your work, then step back. --}}
    @if ($this->tasks->count() == 1)
    <span class="w-4 h-4 bg-red-500 rounded-full inline-block m-1 "></span>
    @elseif($this->tasks->count() > 1)
    <span class=" text-zinc-500 mx-1">{{$this->tasks->count()}}</span>
    <span class="w-4 h-4 bg-red-500 rounded-full inline-block m-1 "></span>
    @else
    @endif
</div>
