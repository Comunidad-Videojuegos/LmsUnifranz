

<button style="background-color: {{$bg}}; color: {{$color}}"
    class="p-2 rounded-lg hover:scale-110 ease-linear duration-150" onclick="{{$function}}('{{ json_encode($params) }}')">
    <i class="{{$icon}}"></i>
</button>
