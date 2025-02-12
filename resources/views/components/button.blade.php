<div>
    @if ($attributes->has('href'))
        <a
            {{ $attributes->has('class') ? $attributes : $attributes->merge(['class' => 'bg-gradient-to-r from-blue-700 to-purple-700 bg-clip-text text-transparent hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 hover:border-blue-700 hover:bg-clip-border  hover:text-white  border-blue-700 hover:border-none font-semibold py-2.5 px-4 border rounded shadow']) }}>
            {{ $slot }}
        </a>
    @elseif($attributes->has('name'))
        <button type="submit"
            {{ $attributes->has('class') ? $attributes : $attributes->merge(['class' => 'bg-gradient-to-r from-blue-700 to-purple-700 bg-clip-text text-transparent hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 hover:border-blue-700 hover:bg-clip-border  hover:text-white  border-blue-700 hover:border-none font-semibold py-2.5 px-4 border rounded shadow']) }}>
            {{ $slot }}
        </button>
    @else
        <button type="button"
            {{ $attributes->has('class') ? $attributes : $attributes->merge(['class' => 'bg-gradient-to-r from-blue-700 to-purple-700 bg-clip-text text-transparent hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 hover:border-blue-700 hover:bg-clip-border  hover:text-white  border-blue-700 hover:border-none font-semibold py-2.5 px-4 border rounded shadow']) }}>
            {{ $slot }}
        </button>
    @endif
</div>
