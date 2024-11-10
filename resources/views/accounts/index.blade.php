@extends('layouts.app')

@section('content')
<div class="p-5 text-center font-bold text-2xl">
    <h1 class="text-green text-3xl">Account</h1>
    <button class="mt-3 py-2 px-4 bg-green text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
    <a href="{{ route('accounts.create') }}" class="btn btn-primary btn-sm">
        Add Your Account
    </a>
    </button>
</div>

@if (session()->has('success'))
    <div class="bg-green-100 text-green-800 p-4 rounded-lg mt-4 text-center">
        {{ session()->get('success') }}
    </div>
@endif

<div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
        @forelse ($accounts as $account)
            <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition-transform hover:scale-105">
                <div class="p-4">
                    <h5 class="text-sm font-bold text-gray-500 mb-2">#{{ Str::padLeft($account->id, 4, '0') }}</h5>
                    <a href="{{ route('accounts.show', $account->id) }}" class="text-lg font-semibold text-gray-800 hover:text-blue-600">
                        {{ $account->name }}
                    </a>
                    <span class="inline-block mt-2 px-3 py-1 text-sm font-medium bg-green-100 text-green-800 rounded-full">
                        {{ $account->rarity }} Star
                    </span>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <p class="text-center text-gray-600">There's No Account Information</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
