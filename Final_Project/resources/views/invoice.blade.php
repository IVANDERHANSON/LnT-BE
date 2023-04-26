<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Invoice') }}
        </h2>
    </x-slot>

    @php
        $i = 0;    
    @endphp

    @foreach(Auth::user()->invoices as $invoice)
        @php
            $i++;
        @endphp
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div style="margin: 50px 0px 50px; border: dashed;">
                            <div style="margin: 10px 10px; font-size: 30px;">
                                <p style="color: orange;">Invoice Number {{ $invoice->id }}</p>
                                <p>Category: {{ $invoice->category }}</p>
                                <p>Item: {{ $invoice->item }}</p>
                                <p>Quantity: {{ $invoice->quantity }}</p>
                                <p>Address: {{ $invoice->address }}</p>
                                <p>Postal Code: {{ $invoice->postalCode }}</p>
                                <p>Price: Rp. {{ $invoice->price }}</p>
                                <p style="color: blue;">Total Price: Rp. {{ $invoice->totalPrice }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @if($i == 0)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ "There is no invoice" }}
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
