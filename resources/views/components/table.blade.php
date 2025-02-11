<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                @foreach ($tableData['heading'] as $heading)
                    @if ($heading != 'id')
                        <th scope="col" class="px-6 py-3">
                            {{ $heading }}
                        </th>
                    @endif
                @endforeach
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tableData['data'] as $data)
                @if ($loop->odd)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-800">
                        @foreach ($data as $key => $information)
                            @if ($key != 'id')
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $information }}
                                </th>
                            @endif
                        @endforeach
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{-- UPDATE --}}
                            @if($title == 'My Spendings')
                            <a type="button" href="{{ url('editSpending/' . $data['id']) }}">Edit</button>
                                @else
                                <a type="button" href="{{ url('editIncome/' . $data['id']) }}">Edit</button>
                            @endif
                            |
                            {{-- DELETE --}}
                            </form>
                            @if ($title == 'My Spendings')
                                <form action="{{ url('./destroySpending/' . $data['id']) }}" method="post"
                                    style="display:inline;">
                                @else
                                    <form action="{{ url('./destroyIncome/' . $data['id']) }}" method="post"
                                        style="display:inline;">
                            @endif
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value={{ $data['id'] }}>
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </th>
                    </tr>
                @else
                    <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700">
                        @foreach ($data as $key => $information)
                            @if ($key != 'id')
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $information }}
                                </th>
                            @endif
                        @endforeach
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{-- UPDATE --}}
                            @if($title == 'My Spendings')
                            <a type="button" href="{{ url('editSpending/' . $data['id']) }}">Edit</button>
                                @else
                                <a type="button" href="{{ url('editIncome/' . $data['id']) }}">Edit</button>
                            @endif
                            |
                            {{-- DELETE --}}
                            @if ($title == 'My Spendings')
                                <form action="{{ url('./destroySpending/' . $data['id']) }}" method="post"
                                    style="display:inline;">
                                @else
                                    <form action="{{ url('./destroyIncome/' . $data['id']) }}" method="post"
                                        style="display:inline;">
                            @endif
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value={{ $data['id'] }}>
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </th>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>