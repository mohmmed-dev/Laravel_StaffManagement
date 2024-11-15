<x-app-layout>
    @livewire('add-manger', ['project' => $project], key(auth()->user()->id))
</x-app-layout>
