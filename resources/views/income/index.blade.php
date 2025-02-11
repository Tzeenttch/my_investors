<x-layouts.index :title="$title">
    <x-table :tableData="$tableData" :title="$title"/>
    <div class="mt-4">
      <x-button href='./createIncome'>Add</x-button>
    </div>
  </x-layouts.index>