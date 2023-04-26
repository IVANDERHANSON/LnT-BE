<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    @php
        $i = 0;    
    @endphp

    @foreach ($categories as $category)
        @php
            $i++;
        @endphp
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p style="font-size: 50px;">{{ $category->category }}</p>
                        @php
                            $j = 0;    
                        @endphp
                        @foreach ($items as $item)
                            @if($item->category_id == $category->id)
                                @php
                                    $j++;
                                @endphp
                                <div style="margin: 50px 0px 50px; border: solid;">
                                    <img src="{{asset('/storage/Item/'.$item->image)}}" alt="{{ $item->image }}" style="margin: 10px 10px; border: solid; border-width: thin;">
                                    <p style="margin: 10px 10px; border: solid; border-width: thin; font-size: 30px;">Item: {{ $item->item }}</p>
                                    <p style="margin: 10px 10px; border: solid; border-width: thin; font-size: 30px;">Price: Rp. {{ $item->price }}</p>
                                    <p style="margin: 10px 10px; border: solid; border-width: thin; font-size: 30px;">Quantity: {{ $item->quantity }}</p>
                                    @if(Auth::user()->isAdmin == 1)
                                        <x-primary-button style="margin: 10px 10px; background-color:blue;">
                                            <a href="{{route('edit', $item->id)}}">EDIT</a>
                                        </x-primary-button>
                                        <form action="/delete-item/{{ $item->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <x-primary-button style="margin: 10px 10px; background-color: red;">
                                                DELETE
                                            </x-primary-button>
                                        </form>
                                    {{-- Cetak Faktur --}}
                                    @else
                                        @if($item->quantity == 0)
                                            <span class="text-error block" style="margin: 10px 10px; color: red;">{{ "Out of stock." }}</span>
                                        @else
                                        <x-primary-button style="margin: 10px 10px; background-color: orange;">
                                            <a href="{{ route('print', $item->id) }}">PRINT INVOICE</a>
                                        </x-primary-button>
                                        @endif
                                    @endif
                                </div>
                            @endif
                        @endforeach
                        @if($j == 0)
                            {{ "No item have been added yet" }}
                        @endif
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
                    {{ "No category have been added yet." }}
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
