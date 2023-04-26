<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MEKSIKO</title>
</head>
<body>
    <h1>Edit Item</h1>
    <form action="/update-item/{{ $item->id }}", method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-3">
            @error('category_id')
                <span class="text-error block" style="color: red;">{{ 'The category field is required.' }}</span><br>
            @enderror
            <label for="exampleInputPassword1" class="form-label">Category</label>
            <br>
            <select class="form-select" aria-label="Default select example" name="category_id">
                <option value="{{ $item->category->id }}">{{ $item->category->category }}</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->category}}</option>
                @endforeach
            </select>
        </div>

        <div>
            <br>
            @error('item')
                <span class="text-error block" style="color: red;">{{ $message }}</span><br>
            @enderror
            <input type="text" class="form-control" id="exampleInputPassword1" name='item' placeholder="Item" value="{{ $item->item }}">
        </div>

        <div>
            <br>
            @error('price')
                <span class="text-error block" style="color: red;">{{ $message }}</span><br>
            @enderror
            <input type="number" class="form-control" id="exampleInputPassword1" name='price' placeholder="Price" value="{{ $item->price }}">
        </div>

        <div>
            <br>
            @error('quantity')
                <span class="text-error block" style="color: red;">{{ $message }}</span><br>
            @enderror
            <input type="number" class="form-control" id="exampleInputPassword1" name='quantity' placeholder="Quantity" value="{{ $item->quantity }}">
        </div>

        <div class="mb-3">
            <br>
            @error('image')
                <span class="text-error block" style="color: red;">{{ $message }}</span><br>
            @enderror
            <label for="exampleInputPassword1" class="form-label">Image</label>
            <br>
            <input type="file" class="form-control" id="exampleInputPassword1" name='image' value="{{ $item->image }}">
        </div>

        <div>
            <br>
            <x-primary-button class="mt-2">
                <input type="submit" value="Submit">
            </x-primary-button>
        </div>
    </form>
</body>
</html>