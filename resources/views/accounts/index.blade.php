@extends('layouts.app')

@section('content')
<div class="p-5 text-center font-bold text-2xl">
  <h1 class="text-teal text-3xl">Account</h1>
  <button class="mt-3 py-2 px-4 bg-teal text-white font-semibold rounded-md hover:bg-pink focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
    <a href="{{ route('accounts.create') }}" class="text-white">Add Account</a>
  </button>
</div>

<div class="container mx-auto px-4 py-8">
  {{-- Flash Message --}}
  @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
      {{ session('success') }}
    </div>
  @endif

  <div class="flex justify-center">
    <div class="w-full max-w-6xl">
      <div class="grid grid-cols-1 gap-4">
        @forelse ($accounts as $account)
          <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition-transform hover:scale-105">
            <div class="p-6">
              {{-- Account Name --}}
              <a href="{{ route('accounts.show', $account->id) }}" class="text-lg font-semibold text-gray-800 hover:text-blue-600">
                {{ $account->name }}
              </a>

              {{-- Account Details --}}
              <div class="flex flex-wrap mt-2">
                <span class="px-3 py-1 text-sm font-medium bg-green-100 text-green-800 mr-2">
                  UID: {{ $account->uid }}
                </span>
                <span class="px-3 py-1 text-sm font-medium bg-green-100 text-green-800 mr-2">
                  Email: {{ $account->email }}
                </span>
                <span class="px-3 py-1 text-sm font-medium bg-green-100 text-green-800">
                  Server: {{ $account->location }}
                </span>
              </div>

              {{-- Characters Section --}}
              @if ($account->characters->isNotEmpty())
                <div class="mt-3">
                  <h5 class="text-gray-700 font-semibold">Characters:</h5>
                  <ul class="list-disc list-inside">
                    @foreach ($account->characters as $character)
                      <li class="text-gray-800">{{ $character->name }}</li>
                    @endforeach
                  </ul>
                </div>
              @else
                <div class="mt-3">
                  <p class="text-gray-500">No characters linked to this account.</p>
                </div>
              @endif

              {{-- Delete Button --}}
              <form action="{{ route('accounts.destroy', $account) }}" method="POST" class="inline-block mt-3">
                @csrf
                @method('DELETE')
                <button type="submit" class="py-2 px-4 bg-teal text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50" onclick="return confirm('Are you sure you want to delete this account?');">
                  Delete
                </button>
              </form>
            </div>
          </div>
        @empty
          <div class="col-span-full">
            <p class="text-center text-gray-600">No accounts available. Add a new account using the button above.</p>
          </div>
        @endforelse
      </div>
    </div>
  </div>
</div>
@endsection
