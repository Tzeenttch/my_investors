<x-layouts.index :title="$title">
    <div>
        <form action="./spendings" method="POST" class="w-full max-w-sm">
            @csrf
            <x-input :for="'date'" :name="'date'" :id="'date'" :type="'date'" :label="'Date:'"
                :value="'date'" />
            @if ($errors->get('date'))
                <ul class="list-none p-2 text-red-500 font-semibold">
                    @foreach ($errors->get('date') as $error)
                        <li class="text-red-500 ml-5 font-normal">{{ $error }}</li>
                    @endforeach
            @endif

            <x-select :selected="'Santander'" :label="'Bank:'" :for="'bank'" :id="'bank'" :name="'bank'"
                :options="['Santander', 'BBVA', 'CaixaBank', 'Caja Rural', 'Unicaja']" />

            <x-select :selected="'Bizum'" :label="'Category:'" :for="'category'" :id="'category'" :name="'category'"
                :options="['Bizum', 'Transferencia', 'Efectivo', 'Tarjeta de credito']" />

            <x-input :for="'amount'" :name="'amount'" :id="'amount'" :type="'text'" :label="'Amount:'"
                :value="'0.00'" />

            @if ($errors->get('amount'))
                <ul class="list-none p-2 text-red-500 font-semibold">
                    @foreach ($errors->get('amount') as $error)
                        <li class="text-red-500 ml-5 font-normal">{{ $error }}</li>
                    @endforeach
            @endif
            <div class="md:flex md:items-center pt-5">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <x-button name="crear">Create Spending</x-button>
                </div>
            </div>
        </form>
    </div>
</x-layouts.index>
