<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MEKSIKO</title>
</head>
<body>
    <h1>Print Invoice</h1>
    <form action="/saveInvoice" method="POST">
        @csrf
        {{-- Category --}}
        @foreach ($categories as $category)
            @if($item->category_id == $category->id)
                <div>
                    <br>
                    <input type="hidden" name='category' value="{{ $category->category }}">
                    <p>Category: {{ $category->category }}</p>
                    @php
                        break;
                    @endphp
                </div>
            @endif
        @endforeach

        {{-- Item --}}
        <div>
            <br>
            <input type="hidden" name='item' value="{{ $item->item }}">
            <p>Item: {{ $item->item }}</p>
        </div>
        
        {{-- item_id --}}
        <input type="hidden" name='item_id' value="{{ $item->id }}">

        {{-- Stock --}}
        <div>
            <br>
            <p>Stock: {{ $item->quantity }}</p>
        </div>
        
        {{-- Quantity --}}
        <div>
            <br>
            @error('quantity')
                <span class="text-error block" style="color: red;">{{ $message }}</span>
            @enderror
            <input type="number" class="form-control" id="quantityInput" name='quantity' placeholder="Quantity" value="{{ 'quantity' }}">
        </div>

        {{-- Address --}}
        <div>
            <br>
            @error('address')
                <span class="text-error block" style="color: red;">{{ $message }}</span>
            @enderror
            <textarea name='address' placeholder="Address" rows="3" style="resize: none;">{{ old('address') }}</textarea>
        </div>

        {{-- Postal Code --}}
        <div>
            <br>
            @error('postalCode')
                <span class="text-error block" style="color: red;">{{ $message }}</span>
            @enderror
            <input type="text" class="form-control" id="exampleInputPassword1" name='postalCode' placeholder="Postal Code" value="{{ old('postalCode') }}">
        </div>

        {{-- Price --}}
        <div>
            <br>
            <input type="hidden" name='price' id="priceInput" value="{{ $item->price }}">
            <p>Price: Rp. {{ $item->price }}</p>
        </div> 

        {{-- Total Price --}}
        <div>
            <br>
            @error('totalPrice')
                <span class="text-error block" style="color: red;">{{ $message }}</span>
            @enderror
            <p>Total Price: Quantity*Price</p>
            <p>Total Price: <span id="totalPrice"></span></p>
            <input type="hidden" name="totalPrice">
        </div>

        {{-- Save Invoice --}}
        <div>
            <br>
            <x-primary-button class="mt-2">
                <input type="submit" value="Save">
            </x-primary-button>
        </div>
    </form>
</body>

<script>
    const quantityInput = document.getElementById("quantityInput");
    const priceInput = document.getElementById("priceInput");
    const totalPriceOutput = document.getElementById("totalPrice");

    quantityInput.addEventListener("input", () => {
        const quantity = parseInt(quantityInput.value);
        const price = parseFloat(priceInput.value);
        const totalPrice = quantity * price;
        totalPriceOutput.textContent = `Rp. ${totalPrice}`;

        document.getElementsByName('totalPrice')[0].value = totalPrice;
    });
</script>
</html>