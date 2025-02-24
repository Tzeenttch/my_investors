<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right mt-5 text-gray-500 dark:text-gray-400">
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
            @foreach ($tableData['data'] as $key => $data)
                <tr
                    class="border-b @if ($loop->odd) bg-gray-800 @else bg-gray-700 text-white @endif dark:border-gray-800">
                    @foreach ($data as $key => $information)
                        @if ($key != 'id')
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $information }}
                            </th>
                        @endif
                    @endforeach
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                        {{-- SHOW --}}
                        @if ($title == 'My Spendings')
                            <a class="bg-gradient-to-r from-blue-500 to-purple-500 bg-clip-text text-transparent hover:bg-gradient-to-r hover:from-green-400 hover:to-purple-400 hover:border-green-400 border-blue-400 font-semibold py-2.5 px-4 border border-none-400 rounded shadow"
                                type="button" href="{{ url('spendings/show/' . $data['id']) }}">Show</a>
                        @else
                            <a class="bg-gradient-to-r from-blue-500 to-purple-500 bg-clip-text text-transparent hover:bg-gradient-to-r hover:from-green-400 hover:to-purple-500 hover:border-green-400 border-blue-400 font-semibold py-2.5 px-4 border border-none-400 rounded shadow"
                                type="button" href="{{ url('incomes/show/' . $data['id']) }}">Show</a>
                        @endif

                        {{-- UPDATE --}}
                        @if ($title == 'My Spendings')
                            <a class="bg-gradient-to-r from-blue-500 to-purple-500 bg-clip-text text-transparent hover:bg-gradient-to-r hover:from-green-400 hover:to-purple-400 hover:border-green-400 border-blue-400 font-semibold ml-2 mr-2 py-2.5 px-4 border border-none-400 rounded shadow"
                                type="button" href="{{ url('spendings/edit/' . $data['id']) }}">Edit</a>
                        @else
                            <a class="bg-gradient-to-r from-blue-500 to-purple-500 bg-clip-text text-transparent hover:bg-gradient-to-r hover:from-green-400 hover:to-purple-500 hover:border-green-400 border-blue-400 font-semibold ml-2 mr-2 py-2.5 px-4 border border-none-400 rounded shadow"
                                type="button" href="{{ url('incomes/edit/' . $data['id']) }}">Edit</a>
                        @endif

                        </form>
                        {{-- DELETE --}}
                        @if ($title == 'My Spendings')
                            <form action="{{ route('spendings.destroy', ['id' => $data['id']]) }}" method="POST"
                                style="display:inline;">
                            @else
                                <form action="{{ url('incomes/delete/' . $data['id']) }}" method="post"
                                    style="display:inline;">
                        @endif
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value={{ $data['id'] }}>
                        <button
                            class="bg-gradient-to-r from-red-700 to-purple-500 bg-clip-text text-transparent hover:bg-gradient-to-r hover:from-yellow-600 hover:to-purple-500 hover:border-yellow-500 border-red-500 font-semibold py-2 px-4 border border-none-400 rounded shadow"
                            type="submit">Delete</button>
                        </form>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
