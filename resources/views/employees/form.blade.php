@csrf
    <div class="mb-6">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">{{__('Name')}}</label>
        <input type="text"  id="name" name="name" value="{{old('name') ?? $employee['name']}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 " />
        @error('name')
            <div class="text-red-500">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-6">
        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 ">{{__('User Name')}}</label>
        <input type="text"  id="username" name="username" value="{{old('username') ?? $employee['username']}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 " />
        @error('username')
            <div class="text-red-500">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-6">
        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 ">{{__('Image')}}</label>
        <input type="file" id="image" name="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 "/>
        @error('image')
            <div class="text-red-500">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-6">
        <label for="key" class="block mb-2 text-sm font-medium text-gray-900 ">{{__('Kay')}}</label>
        <input type="text" id="key" name="key" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 "/>
        @error('key')
            <div class="text-red-500">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-6 flex gap-x-1">
        <div class="my-2">
            <label for="age" class="block mb-2 text-sm font-medium text-gray-900 ">{{__('Age')}}</label>
            <input type="number"  id="age" name="age" value="{{old('age') ?? $employee['age']}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 " />
            @error('age')
                <div class="text-red-500">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="my-2">
            <label for="salary" class="block mb-2 text-sm font-medium text-gray-900 ">{{__('Salary')}}</label>
            <input type="number"  id="salary" name="salary" value="{{old('salary') ?? $employee['salary']}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 " />
            @error('salary')
                <div class="text-red-500">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="my-2">
            <label for="nationality" class="block mb-2 text-sm font-medium text-gray-900 ">{{__('Nationality')}}</label>
            <input type="text"  id="nationality" name="nationality" value="{{old('nationality') ?? $employee['nationality']}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 " />
            @error('nationality')
                <div class="text-red-500">
                    {{$message}}
                </div>
            @enderror
        </div>
    </div>
    @livewire('job-titles')

