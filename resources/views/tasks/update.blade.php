<x-app-layout>
    <div class="md:grid grid-cols-12 gap-1 h-full sm:bg-transparentrounded-sm p-2 ">
        <form method="POST" action="{{route('project.tasks.update',[$project->id,$task->id])}}"  class="bg-neutral-200 col-span-6 col-start-4 p-2 mt-3 rounded-md shadow-sm">
            @method('PATCH')
            @include('tasks.form',[$task,'employees' => $project->Employees])
            <button type="submit" class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">{{__("Update")}}</button>
        </form>
        <form action="{{route('project.tasks.destroy',[$project->id,$task->id])}}"  method="POST" class="col-span-6 col-start-4 p-2 mt-3">
            @method('DELETE')
            <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">{{__("Delete")}}</button>
        </form>
    </div>
</x-app-layout>
