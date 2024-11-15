    <div class=" flex gap-1 items-center ">

        <a href="/lang/en" class="w-fit {{ app()->getLocale() == "en" ? 'shadow-sm' : '' }} flex border-1 px-2 py-2 hover:shadow-md rounded-md bg-neutral-50">{{__('EN')}}</a>
        <a href="/lang/ar" class="w-fit  {{ app()->getLocale() == "ar" ? 'shadow-sm' : '' }} flex border-1 px-2 py-2 hover:shadow-md rounded-md bg-neutral-50">{{__('AR')}}</a>
    </div>
