<div>
    @php
        $classes=" text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
    @endphp

    {{-- merge para pasar los atributos dinamicos del componente --}}
    <a {{$attributes->merge(['class'=>$classes])}}>
        {{-- le pasamos un slot --}}
        {{$slot}}
    </a>
</div>