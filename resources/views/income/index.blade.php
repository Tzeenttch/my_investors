<x-layouts.index :title="$title">
  
  <div class="mt-4">
    <x-button href='./createIncome'>Add</x-button>
  </div>
  

  <x-table :tableData="$tableData" :title="$title"/>
  </x-layouts.index>