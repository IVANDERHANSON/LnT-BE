<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Item') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="addItem" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            @error('category_id')
                                <span class="text-error block" style="color: red;">{{ 'The category field is required.' }}</span>
                            @enderror
                            <label for="exampleInputPassword1" class="form-label">Category</label>
                            <br>
                            <select class="form-select" aria-label="Default select example" name="category_id">
                                <option style="display: none;"></option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <br>
                            @error('item')
                                <span class="text-error block" style="color: red;">{{ $message }}</span>
                            @enderror
                            <input type="text" class="form-control" id="exampleInputPassword1" name='item' placeholder="Item" value="{{ old('item') }}">
                        </div>

                        <div>
                            <br>
                            @error('price')
                                <span class="text-error block" style="color: red;">{{ $message }}</span>
                            @enderror
                            <input type="number" class="form-control" id="exampleInputPassword1" name='price' placeholder="Price" value="{{ old('price') }}">
                        </div>

                        <div>
                            <br>
                            @error('quantity')
                                <span class="text-error block" style="color: red;">{{ $message }}</span>
                            @enderror
                            <input type="number" class="form-control" id="exampleInputPassword1" name='quantity' placeholder="Quantity" value="{{ old('quantity') }}">
                        </div>

                        <div class="mb-3">
                            <br>
                            @error('image')
                                <span class="text-error block" style="color: red;">{{ $message }}</span>
                            @enderror
                            <label for="exampleInputPassword1" class="form-label">Image</label>
                            <br>
                            <input type="file" class="form-control" id="exampleInputPassword1" name='image' value="{{old('image')}}">
                        </div>

                        <div>
                            <br>
                            <x-primary-button class="mt-2">
                                <input type="submit" value="Submit">
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
