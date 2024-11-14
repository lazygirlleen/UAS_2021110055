@extends('layouts.app')

@section('content')
<div class="p-5 text-center font-bold text-2xl">
                <h1 class="text-green text-3xl">Account</h1>
                <button class="mt-3 py-2 px-4 bg-green text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
                    <a href="{{ route('accounts.create') }}" class="btn btn-primary btn-sm">
                        Add Account
                    </a>
                </button>
            </div>

    <div class="container mx-auto px-4 py-8">
    <div class="flex justify-center">
        <div class="w-full max-w-6xl">
            <div class="grid w-full place-content-center bg-gray-100">
                @forelse ($accounts as $account)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition-transform hover:scale-105">
                        <div class="p-6">
                            <a href="{{ route('accounts.show', $account->id) }}" class="text-lg font-semibold text-gray-800 hover:text-blue-600">
                                {{ $account->name }}
                            </a>
                            <span class="block mt-2 px-3 py-1 text-sm font-medium bg-green-100 text-green-800 ">
                                Email: {{ $account->email }}
                            </span>
                            <span class="block mt-2 px-3 py-1 text-sm font-medium bg-green-100 text-green-800">
                                Server: {{ $account->location }}
                            </span>
                            @foreach ($account->characters as $character)
                                <span class="badge bg-primary">{{ $character->avatar }}</span>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <div class="col-span-full">
                        <p class="text-center text-gray-600">There's No Account Information</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

            </div>
        </div>
    </div>

</body>
@endsection

