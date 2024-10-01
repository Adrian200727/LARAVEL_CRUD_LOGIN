@extends('layouts.app')

@section('content')

<div class="container mx-auto mt-4">
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 xl:w-4/12">
            <div class="bg-white shadow-lg rounded-md">
                <div class="bg-gray-800 rounded-t-md px-4 py-3">
                    <div class="flex justify-between items-center">
                        <h3 class="text-white text-lg font-semibold">Create Product</h3>
                        <a href="{{ route('products.index') }}" class="text-sm text-gray-300 hover:text-white">Back</a>
                    </div>
                </div>

                <div class="card-body px-4 py-3">
                    <form action="{{ route('products.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="block text-gray-700 font-medium mb-2">Nama</label>
                            <input value="{{ old('name') }}" type="text" class="border p-2 w-full rounded-md @error('name') border-red-500 @enderror" id="name" placeholder="Masukan Nama" name="name">
                            @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="block text-gray-700 font-medium mb-2">Harga</label>
                            <input value="{{ old('price') }}" type="text" class="border border-gray-400 p-2 w-full rounded-md @error('price') border-red-500 @enderror" id="price" placeholder="Masukan Harga" name="price">
                            @error('price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="block text-gray-700 font-medium mb-2">Deskripsi</label>
                            <textarea placeholder="Masukan Deskripsi" class="border border-gray-400 p-2 w-full rounded-md" id="description" name="description" cols="30" rows="5">{{ old('description') }}</textarea>
                            @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection