@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-4 flex-row">
    <div class="flex justify-end">
        <a href="{{ route('products.create') }}" class="bg-gray-800 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-600">Tambah</a>
    </div>
    @if (Session::has('success'))
    <div class="mt-4">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ Session::get('success') }}</span>
        </div>
    </div>
    @endif
    <div class="flex justify-center">
        <div class="w-full md:w-10/12 lg:w-8/12 xl:w-6/12">
            <div class="bg-white shadow-lg rounded-md my-4">
                <div class="bg-gray-800 rounded-t-md px-4 py-3">
                    <h3 class="text-white text-lg font-semibold">Products</h3>
                </div>
                <div class="card-body px-4 py-3">
                    <table class="table-auto w-full">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2"></th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Price</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($products->isNotEmpty())
                            @foreach ($products as $product)
                            <tr>
                                <td class="border px-4 py-2">{{ $product->id }}</td>
                                <td class="border px-4 py-2">
                                    @if ($product->image != "")
                                    <img width="50" src="{{ asset('uploads/products/'.$product->image) }}" alt="">
                                    @endif
                                </td>
                                <td class="border px-4 py-2">{{ $product->name }}</td>
                                <td class="border px-4 py-2">Rp.{{ $product->price }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('products.edit',$product->id) }}" class="bg-gray-800 hover:bg-gray-700 text-white font-medium py-1 px-2 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-600 text-xs">Edit</a>
                                    <form id="delete-product-from-{{ $product->id }}" action="{{ route('products.destroy',$product->id) }}" method="post" class="inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="button" onclick="deleteProduct({{ $product->id }});" class="bg-red-500 hover:bg-red-700 text-white font-medium py-1 px-2 rounded-md focus:outline-none focus:ring-2 focus:ring-red-300 text-xs">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteProduct(id) {
        if (confirm("Are you sure you want to delete product?")) {
            document.getElementById("delete-product-from-" + id).submit();
        }
    }
</script>
@endsection