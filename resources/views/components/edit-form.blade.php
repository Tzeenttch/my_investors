<div>

    <form action="{{route($action.'.update', $record->id)}}" method="POST" class="w-full max-w-sm">
        @csrf
        @method('PATCH')
        <label for="date" class="block text-gray-500 font-bold md:text-left mb-0 md:mb-0 pr-4">Date:</label>
        <input
            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
            type="date" name="date" value="{{$record->date}}" required>

        @if ($action == 'spendings')
            <label for="bank" class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4 pt-5">Bank:</label>
            <input
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                type="text" name="bank" value="{{$record->bank}}" required>
        @endif

        <label for="category"
            class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4 pt-5">Category:</label>
        <input
            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
            type="text" name="category" value="{{$record->category}}" required> 

        <label for="amount" class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4 pt-5">Amount:</label>
        <input
            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
            type="number" name="amount" value="{{$record->amount}}" required> 
        <div class="md:flex md:items-center pt-5">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                @if ($action == 'spendings')
                    <button
                        class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                        type="submit">Edit Spending</button>
                @elseif($action == 'incomes')
                    <button
                        class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                        type="submit">Edit Income</button>
                @endif
            </div>
        </div>
        
        <!--Show the errors-->
        @if ($errors->any())
            <div>
                <ul class="list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
</div>
