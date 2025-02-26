<x-layouts.index :title="$title" :name="$name">
    @if (session('Success'))
        <div id="alert-border-3"
            class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800 rounded-md"
            role="alert">
            <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div class="ms-3 text-sm font-medium">
                <ul class="list-disc p-2 text-green-600 font-semibold"> Success:
                    <li class="text-green-600 ml-5 font-normal">{{ session('Success') }}</li>
                </ul>
            </div>

        </div>
    @endif

    <div class="mt-4">
        <x-button href='incomes/create'>Add Income</x-button>
    </div>
    <div class="">
        <form action="/incomes/filterCategory" method="POST" class="w-full max-w-sm">
            @csrf
            <x-select :selected="'Bizum'" :label="'Filtrar por categoria:'" :for="'category_id'" :id="'category_id'" :name="'category_id'"
            :options="['Bizum', 'Transferencia', 'Tarjeta de credito']" />
            <div class="mt-5"></div>
            <x-button name="filtrar">Filter Incomes</x-button>
        </form>
    </div>
    @if (empty($tableData['data']))
        <div class="flex items-center justify-center mt-20">
            <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64"
                    class="mx-auto mb-2">
                    <path fill="grey"
                        d="M32 2C15.432 2 2 15.432 2 32s13.432 30 30 30s30-13.432 30-30S48.568 2 32 2m0 57.5C16.836 59.5 4.5 47.164 4.5 32S16.836 4.5 32 4.5S59.5 16.836 59.5 32S47.164 59.5 32 59.5" />
                    <circle cx="20.5" cy="26.592" r="5" fill="grey" />
                    <circle cx="43.5" cy="26.592" r="5" fill="grey" />
                    <path fill="grey"
                        d="M32 39.794c-4.539 0-8.082 3.058-9.836 6.491c-.471.918.154 1.913.848 1.34c5.793-4.801 12.219-4.771 17.977 0c.693.573 1.318-.422.848-1.34c-1.755-3.433-5.3-6.491-9.837-6.491" />
                </svg>
                <h1 class="text-xl text-gray-600">You have no incomes.</h1>
            </div>
        </div>
    @else
        <x-table :tableData="$tableData" :title="$title" />
    @endif
</x-layouts.index>
