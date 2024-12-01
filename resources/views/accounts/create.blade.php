@extends('layouts.app')

@section('title', 'Add Your Account')

@section('content')
<div class="p-5 text-center">
    <h1 class="text-teal text-3xl font-bold">Add Your Account</h1>
</div>

<div class="container mx-auto my-8 px-4">
    {{-- Display Validation Errors --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Account Form --}}
    <form action="{{ route('accounts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- Account Details Section --}}
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="font-semibold text-lg mb-4">Account Details</h2>

            <div class="mb-4">
                <label for="uid" class="block text-gray-700 font-medium">UID</label>
                <input
                    type="text"
                    id="uid"
                    name="uid"
                    class="block w-full border border-gray-300 rounded-md p-2"
                    placeholder="Enter your UID"
                    value="{{ old('uid') }}"
                    required>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium">Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="block w-full border border-gray-300 rounded-md p-2"
                    placeholder="Enter your name"
                    value="{{ old('name') }}"
                    required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="block w-full border border-gray-300 rounded-md p-2"
                    placeholder="Enter your email"
                    value="{{ old('email') }}"
                    required>
            </div>
        </div>

        {{-- Server Selection Section --}}
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="font-semibold text-lg mb-4">Choose Server</h2>

            <div class="mb-4">
                <label for="location" class="block text-gray-700 font-medium">Server</label>
                <select
                    id="location"
                    name="location"
                    class="block w-full border border-gray-300 rounded-md p-2"
                    required>
                    <option value="" disabled selected>Select a server</option>
                    <option value="Asia">Asia</option>
                    <option value="Europe">Europe</option>
                    <option value="America">America</option>
                    <option value="TW">TW, HK, MO</option>
                </select>
            </div>
        </div>

        {{-- Character Selection Section --}}
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="font-semibold text-lg mb-4">Select Character(s)</h2>

            <div class="mb-4">
                <label for="characters" class="block text-gray-700 font-medium">Character Name</label>
                <select
                    id="characters"
                    name="characters[]"
                    class="block w-full border border-gray-300 rounded-md p-2"
                    multiple>
                    @foreach ($characters as $character)
                        <option value="{{ $character->id }}">{{ $character->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Submit Button --}}
        <button
            type="submit"
            class="bg-teal text-white font-bold py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
            Save
        </button>
    </form>
</div>
@endsection
