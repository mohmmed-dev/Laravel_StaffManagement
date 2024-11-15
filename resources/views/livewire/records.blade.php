<d>
    {{-- Start Employees --}}
    <h3 class="m-1 w-fit text-xl border-b-2 border-y-gray-500 rounded-sm">{{__('Employees')}}</h3>
    <div class=" overflow-auto w flex gap-x-1 ">
        <div class="flex gap-x-1  my-3 mx-2">
            @forelse ($this->project->employees as $employee)
                <div class=" bg-zinc-50 w-fit rounded-md p-1 text-center overflow-hidden flex flex-col justify-start items-center" wire:click="employeeRecords({{$employee->id}})">
                    <img class=" rounded-full max-w-10 max-h-10" src="{{$employee->image}}" alt="{{$employee->username}}">
                    <h4 class=" text-sm ">{{'@' . $employee->username}}</h4>
                </div>
            @empty
            @endforelse
        </div>
    </div>
    <div class="flex items-center flex-wrap">
        <div class="mx-2 bg-zinc-50 w-fit rounded-md p-2 text-center overflow-hidden flex flex-col justify-start items-center" wire:click="allRecords">
            <h4 class=" text-sm ">{{__("All")}}</h4>
        </div>
        <div class="flex items-center gap-x-1 flex-wrap">
            <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block  p-2.5 w-fit" name="formDate" value="{{$fromDate}}" wire:model="fromDate" id="">
            <span>{{__('To')}}</span>
            <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block  p-2.5 w-fit" name="toDate" value="{{$toDate}}" wire:model="toDate" id="">
            <div class="w-fit my-3 flex shadow-md border-1 p-2 rounded-md bg-neutral-50 cursor-pointer " wire:click='filterDate'>{{__("Filter")}}</div>
        </div>
    </div>
    <div class="flex flex-wrap gap-1 my-3 mx-2 overflow-y-auto max-h-60">
        @forelse ($arrEmployee as $employee)
            @forelse ($this->filtersAllRecords($employee) as $record)
                <div class=" bg-zinc-50 w-40 overflow-hidden rounded-md px-1 py-2 ">
                    <h4 class="mb-2">{{'@' . $employee->username}}</h4>
                    <div class="border-t-2 pt-1">
                        <span class="p-1 ltr:border-r-2 rtl:border-l-2 ">{{$record->pivot->created_at->isoFormat('h:mm')}}</span>
                        <span class="p-1 uppercase {{$record->pivot->status == 'exists' ? 'text-blue-500' : ($record->pivot->status == 'absent' ? 'text-yellow-500' : ($record->pivot->status == 'sick' ? 'text-red-500': 'text-green-500'))}}">{{$record->pivot->status}}</span>
                    </div>
                </div>
            @empty
            @endforelse
        @empty
        @endforelse
    </div>
    {{-- End Employees --}}
    {{-- Start Add New Recored --}}
    <div>
        <div class=" my-3 text-xl pb-2 border-b-2 border-stone-50 ">{{__('New Recored')}}</div>
        <form >
        <div class="mb-2 flex gap-2 items-center flex-wrap">
        <div class="w-1/3">
            <label for="employees" class="block mb-2 font-medium text-gray-900 text-md ">{{__('Employees')}}</label>
            <select wire:model.change="takeEmployee" class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-900 rounded-lg bg-gray-50 focus:ring-gray-900 focus:border-gray-900 px-4" id="employees" name="employee"  >
            <option disabled  selected>{{__("Employees")}}</option>
                @forelse ($this->project->employees as $employee)
                <option>{{$employee->checkToDay($this->project->Record)->count()}}</option>
                @empty($employee->checkToDay($this->project->Record)->count())
                    <option value="{{$employee->id}}"  >
                        <div>
                            <h3>{{'@'.$employee->username}}</h3>
                        </div>
                    </option>
                @endempty
                @empty
                @endforelse
                </select>
            @error('employees')
            <span class="text-md text-red-500 my-2">{{$message}}</span>
            @enderror
        </div>
        <div class="w-1/3">
            <label for="status" class="block mb-2 font-medium text-gray-900 text-md ">{{__('Status')}}</label>
            <select  wire:model.change="takeStatus" class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-900 rounded-lg bg-gray-50 focus:ring-gray-900 focus:border-gray-900 px-4" name="status">
            <option disabled selected>{{__("Status")}}</option>
                <option value="exists" class="uppercase">{{__('exists')}}</option>
                <option value="absent" class="uppercase">{{__('absent')}}</option>
                <option value="sick" class="uppercase">{{__('sick')}}</option>
                <option value="vacation" class="uppercase" >{{__('vacation')}}</option>
            </select>
            @error('status')
            <span class="text-md text-red-500 my-2">{{$message}}</span>
            @enderror
        </div>
            <div class="w-fit my-3 flex shadow-md border-1 p-2 rounded-md bg-neutral-50 cursor-pointer " wire:click="addNewRecords">{{__('Add')}}</div>
        </div>
        </form>
    </div>
    {{-- End Add New Recored --}}
</div>
