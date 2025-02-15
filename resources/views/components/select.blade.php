<label for="{{ $label }}" class="pt-5 block text-gray-500 font-bold md:text-left mb-0 md:mb-0 pr-4">Category:</label>
<select id={{ $id }} name={{ $name }}
    class="bg-gray-200 border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500">
    @foreach ($options as $option)
        @if ($selected == $option)
            <option $value="{{ $option }}" selected>{{ ucfirst($option) }}</option>
        @else
            <option $value="{{ $option }}">{{ ucfirst($option) }}</option>
        @endif
    @endforeach
</select>
