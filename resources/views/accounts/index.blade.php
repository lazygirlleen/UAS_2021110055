@extends('layouts.app')

@section('content')
<div class="p-5 text-center font-bold text-2xl">
  <h1 class="text-green text-3xl">Account</h1>
  <button class="mt-3 py-2 px-4 bg-green text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
    <a href="{{ route('accounts.create') }}" class="text-white">Add Account</a>
  </button>
</div>

<div class="container mx-auto px-4 py-8">
  <div class="flex justify-center">
    <div class="w-full max-w-6xl">
      <div class="grid grid-cols-1 gap-4">  @forelse ($accounts as $account)
          <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition-transform hover:scale-105">
            <div class="p-6">
              <a href="{{ route('accounts.show', $account->id) }}" class="text-lg font-semibold text-gray-800 hover:text-blue-600">
                {{ $account->name }}
              </a>
              <div class="flex flex-wrap mt-2">  <span class="px-3 py-1 text-sm font-medium bg-green-100 text-green-800 mr-2">
                  Email: {{ $account->email }}
                </span>
                <span class="px-3 py-1 text-sm font-medium bg-green-100 text-green-800">
                  Server: {{ $account->location }}
                </span>
              </div>
              <form action="{{ route('accounts.destroy', $account) }}" method="POST" style="display:inline;">
               @csrf
                @method('DELETE')
                        <button type="submit" class="mt-3 py-2 px-4 bg-green text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50" onclick="return confirm('Apakah Anda yakin ingin menghapus Account ini?');">Delete</button>
                </form>
              </div>
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

</body>
@endsection
