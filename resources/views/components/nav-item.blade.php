{{-- ITEM NAV --}}

<a href="{{route($link)}}">
    <div class="flex justify-around hover:bg-gray-900 py-1 rounded-e-3xl
        {{request()->is($link) ? 'bg-gray-900' : ''}}">
        <div class="flex justify-center items-center h-8 w-20 min-w-20
        group-hover:scale-110 duration-75 ease-linear
        {{request()->is($link) ? 'scale-110' : ''}}">
            @switch($icon)
                @case("sliders")
                    <x-bi-sliders/>
                    @break
                @case("calendar minus fill")
                    <x-bi-calendar-minus-fill />
                    @break

                @case("people fill")
                    <x-bi-people-fill />
                @break

                @case("wifi")
                    <x-bi-wifi />
                @break

                @case("activity")
                    <x-bi-activity />
                @break

                @default
                    <x-bi-badge-sd-fill/>
            @endswitch
        </div>
        <div class="flex justify-center items-center h-8 flex-grow
        group-hover:text-lg duration-100 ease-linear hover:font-semibold
        {{request()->is($link) ? 'font-semibold text-lg' : ''}}">
            <h2 class="w-full">{{$title}}</h2>
        </div>
    </div>
</a>
