
@csrf
    <div class="mb-6">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">{{__('Name')}}</label>
        <input type="text"  id="name" name="name" value="{{old('name') ?? $project['name']}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 " />
        @error('name')
            <div class="text-red-500">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-6">
        <label for="key" class="block mb-2 text-sm font-medium text-gray-900 ">{{__('Key')}}</label>
        <input type="text" id="key" name="key" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 "/>
        @error('key')
            <div class="text-red-500">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-6">
        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">{{__('Description')}}</label>
            <textarea name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 ">{{old('description') ?? $project['description']}}</textarea>
            @error('description')
                    <div class="text-red-500">
                        {{$message}}
                    </div>
            @enderror
    </div>
    <fieldset class="flex gaap-1">
        <legend class="sr-only">{{__("Type")}}</legend>
        <div class="flex items-center mb-4 mx-2">
            <input id="country-option-1" type="radio" name="type" value="store" class="w-4 h-4 border-slate-300  focus:ring-2 focus:ring-slate-300 " @checked((old('tayp') ?? $project['type']) == 'store')>
            <label for="country-option-1" class="block ms-2  text-sm font-medium text-gray-900 ">
            {{__("Store")}}
            </label>
        </div>
        <div class="flex items-center mb-4 mx-2">
            <input id="country-option-2" type="radio" name="type" value="project" class="w-4 h-4 border-slate-300 focus:ring-2 focus:ring-slate-300" @checked((old('tayp') ?? $project['type']) == 'project')>
            <label for="country-option-2" class="block ms-2 text-sm font-medium text-gray-900 ">
            {{__("Project")}}
            </label>
        </div>
    </fieldset>

