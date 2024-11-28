@extends('layouts.app')

@section('title')
    Add Your Account
@endsection

@section('content')
<div class="p-5 text-center font-bold py-4 text-teal">
    <h1 class="text-teal text-3xl">Add Your Account</h1>
</div>

<div class="row my-5">
    <div class="col-12 px-5">
        {{-- Display Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Account Form --}}
        <form action="{{ route('accounts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Account Details Section --}}
            <div class="mb-4">
                <label for="uid" class="block text-gray-700">UID</label>
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
                    <label for="name" class="block text-gray-700">Name</label>
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
                    <label for="email" class="block text-gray-700">Email</label>
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
            <div class="bg-white shadow-md rounded-lg p-6 mb-4">
                <h5 class="font-semibold text-lg mb-4">Choose Server</h5>

                <div class="mb-4">
                    <label for="location" class="block text-gray-700">Server</label>
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
            <div class="bg-white shadow-md rounded-lg p-6 mb-4">
                <h5 class="font-semibold text-lg mb-4">Select Character(s)</h5>

                <div class="mb-4">
                    <label for="character_name" class="block text-gray-700">Character Name</label>
                    <select name="characters[]" class="block w-full border border-gray-300 rounded-md p-2" multiple>
                        @foreach ($characters as $character)
                            <option value="{{ $character->id }}">{{ $character->name }}</option>
                        @endforeach
                    </select>

                </div>
            </div>

            {{-- Submit Button --}}
            <button
                type="submit"
                class="bg-teal text-white font-bold py-2 px-4 rounded mt-4 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
                Save
            </button>
        </form>
    </div>
</div>
@endsection
