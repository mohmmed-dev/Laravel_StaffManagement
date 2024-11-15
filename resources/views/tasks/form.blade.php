@csrf
    <div class="mb-6">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 ">{{__('Title')}}</label>
        <input type="text"  id="title" name="title" value="{{old('title') ?? $task['title']}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 " />
        @error('title')
            <div class="text-red-500">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-6">
        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">{{__('Description')}}</label>
            <textarea name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 ">{{old('description') ?? $task['description']}}</textarea>
            @error('description')
                    <div class="text-red-500">
                        {{$message}}
                    </div>
            @enderror
    </div>
    <div class="mb-2 flex gap-2 items-center">
        <div class="w-1/2">
            <label for="status" class="block mb-2 font-medium text-gray-900 text-md ">{{__('Status')}}</label>
            <select class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-900 rounded-lg bg-gray-50 focus:ring-gray-900 focus:border-gray-900 px-4" name="status">
            <option disabled @selected((old('status') ?? $task['status']) == null)>{{__("Status")}}</option>
                <option value="works" class="uppercase"   @selected((old('status') ?? $task['status']) == 'works')>{{__('works')}}</option>
                <option value="finish" class="uppercase"   @selected((old('status') ?? $task['status']) == 'finish')>{{__('finish')}}</option>
                <option value="waiting" class="uppercase"  @selected((old('status') ?? $task['status']) == 'waiting')>{{__('waiting')}}</option>
                <option value="canceled" class="uppercase"  @selected((old('status') ?? $task['status']) == 'canceled')>{{__('canceled')}}</option>
            </select>
            @error('status')
            <span class="text-md text-red-500 my-2">{{$message}}</span>
            @enderror
        </div>
        <div class="w-1/2">
            <label for="type" class="block mb-2 font-medium text-gray-900 text-md ">{{__('Type')}}</label>
            <select class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-900 rounded-lg bg-gray-50 focus:ring-gray-900 focus:border-gray-900 px-4" name="type">
            <option disabled  @selected((old('type') ?? $task['type']) == null)>{{__("Type")}}</option>
                <option value="urgent" class="uppercase"   @selected((old('type') ?? $task['type']) == 'urgent')>{{__('urgent')}}</option>
                <option value="noturgent"  class="uppercase"  @selected((old('type') ?? $task['type']) == 'noturgent')>{{__('not urgent')}}</option>
                <option value="important"  class="uppercase" @selected((old('type') ?? $task['type']) == 'important')>{{__('important')}}</option>
            </select>
            @error('type')
            <span class="text-md text-red-500 my-2">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="w-2/3">
        <label for="employees" class="block mb-2 font-medium text-gray-900 text-md ">{{__('Employees')}}</label>
        <select class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-900 rounded-lg bg-gray-50 focus:ring-gray-900 focus:border-gray-900 px-4" id="employees" name="employees[]"  multiple>
        <option disabled  @selected((old('employees') ?? $task['employees']) == null)>{{__("Employees")}}</option>
            @forelse ($employees as $employee)
                <option value="{{$employee->id}}"  @selected(optional($task)->IsWorkHere($employee))>
                    <div>
                        <h3>{{'@'.$employee->username}}</h3>
                    </div>
                </option>
            @empty
            @endforelse
            </select>
        @error('employees')
        <span class="text-md text-red-500 my-2">{{$message}}</span>
        @enderror
    </div>


{{-- id="authors" name="authors[]" mul
tiple --}}
