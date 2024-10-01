@extends('layouts.app')

@section('content')
<div class="bg-white p-8 rounded shadow-md w-96">
    <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>

    <form method="POST" action="{{ route('register.submit') }}">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('name')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('email')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
            <input type="password" id="password" name="password" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('password')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Konfirmasi Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Register
            </button>
            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('login') }}">
                Sudah punya akun? Login disini
            </a>
        </div>
    </form>
</div>

@endsection