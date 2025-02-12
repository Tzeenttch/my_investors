<x-layouts.index :title="$title">
    @if (session('Success'))
        <div class="border-2 border-style: solid; border-green-500 mb-5 rounded-md">
            <ul  class="list-disc p-2 text-green-600 font-semibold"> Success:
                  <li class="text-green-600 ml-5 font-normal">{{ session('Success')}}</li>
          </ul>
        </div>
    @endif
    <div class="mt-4">
        <x-button href='/createSpending'>Add Spending</x-button>
    </div>
    <x-table :tableData="$tableData" :title="$title" />
</x-layouts.index>
