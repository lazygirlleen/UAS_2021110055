@extends('layouts.app')

@section('title')

@section('content')

<div class="p-5 text-center font-bold py-4 text-green">
    <h1 class="text-green text-3xl">Add Your Account</h1>
</div>

<div class="row my-5">
    <div class="col-12 px-5">
        @if ($errors->any())
            <div class="alert alert-danger mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('accounts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="bg-white shadow-md rounded-lg p-6 mb-4">
                <h5 class="font-semibold text-lg mb-4">Insert Account Details</h5>

                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name</label>
                    <input type="text" class="block w-full border border-gray-300 rounded-md p-2" id="name" placeholder="Enter your name" name="name" required value="{{ old('name') }}">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" class="block w-full border border-gray-300 rounded-md p-2" id="email" placeholder="Enter your email" name="email" required value="{{ old('email') }}">
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6 mb-4">
                <h5 class="font-semibold text-lg mb-4">Choose Server</h5>

                <label class="block text-gray-700">Server</label>
                <select class="block w-full border border-gray-300 rounded-md p-2" id="location" name="location" required>
                    <option value=""></option>
                    <option value="Asia">Asia</option>
                    <option value="Europe">Europe</option>
                    <option value="America">America</option>
                    <option value="TW">TW, HK, MO</option>

                </select>

            <button type="submit" class="bg-green text-white font-bold py-2 px-4 rounded mt-4 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
                Save
            </button>
        </form>
    </div>
</div>

@endsection
