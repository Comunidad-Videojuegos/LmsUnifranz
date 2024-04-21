{{-- ITEM NAV --}}

<a href="{{$link}}">
    <div class="flex justify-around group-hover:bg-gray-800 py-1 rounded-e-3xl text-white">
        <div class="flex justify-center items-center h-8 w-16 min-w-16
        group-hover:scale-110 duration-75 ease-linear">
            <x-bi-bell-fill class="text-primary text-center"/>
        </div>
        <div class="flex justify-center items-center h-8 flex-grow
        group-hover:text-lg duration-100 ease-linear hover:font-semibold">
            <h2 class="w-full">{{$title}}</h2>
        </div>
    </div>
</a>
