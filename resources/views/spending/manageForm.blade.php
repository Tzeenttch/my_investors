<x-layouts.index :title="$title">
    @if ($operation == 'edit')
    <x-edit-form :action="$action" :record="$record"/>
    @elseif($operation == 'create')
    <x-create-form :action="$action" />
    @endif
</x-layouts.index>
