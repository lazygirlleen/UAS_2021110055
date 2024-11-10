@extends('layouts.app')

@section('content')
<div class="p-5 text-center font-bold py-4 text-green">
    <h1 class="text-green text-3xl">All Characters</h1>
    <button class="mt-3 py-2 px-4 bg-green text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
    <a href="{{ route('characters.create') }}" class="btn btn-primary btn-sm">
        Add New Character
    </a>
    </button>
</div>


@if (session()->has('success'))
    <div class="alert alert-success mt-4">
        {{ session()->get('success') }}
    </div>
@endif

<div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
        @forelse ($characters as $character)
            <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition-transform hover:scale-105">
                <div class="bg-gray-500 rounded-t-lg overflow-hidden">
                    @if ($character->avatar)
                        <img src="{{ $character->avatar_url }}" alt="{{ $character->name }}" class="w-full h-48 object-cover">
                    @endif
                </div>
                <div class="p-4">
                    <h5 class="text-xl font-bold text-gray-900">{{ $character->name }}</h5>
                    <p class="text-base text-gray-700">{{ $character->nation }}</p>
                    <p class="text-base text-gray-700">{{ $character->element }}</p>
                    <span class="inline-block mt-2 px-3 py-1 text-sm font-medium bg-green-100 text-green-800 me-2 rounded dark:bg-green-900 dark:text-green-300">
                        {{ $character->rarity }} Star
                    </span>
                    <div class="mt-4">
                        <a href="{{ route('characters.show', $character->id) }}" class="block text-center text-white bg-blue-500 hover:bg-blue-600 py-2 px-4 rounded-lg">Detail</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <p class="text-center text-gray-600">No Character found.</p>
            </div>
        @endforelse
    </div>

    <div class="flex justify-center mt-8">
        <nav>
            <ul class="inline-flex items-center space-x-1">
                {{-- Previous Page Link --}}
                @if ($characters->onFirstPage())
                    <li class="page-item disabled">
                        <span class="px-3 py-2 text-gray-500 bg-gray-200 rounded">&laquo; Previous</span>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{ $characters->previousPageUrl() }}" class="px-3 py-2 text-blue-500 bg-gray-100 hover:bg-gray-200 rounded">&laquo; Previous</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($characters->links()->elements[0] as $page => $url)
                    @if ($page == $characters->currentPage())
                        <li class="page-item active">
                            <span class="px-3 py-2 bg-blue-500 text-white rounded">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a href="{{ $url }}" class="px-3 py-2 text-blue-500 bg-gray-100 hover:bg-gray-200 rounded">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($characters->hasMorePages())
                    <li class="page-item">
                        <a href="{{ $characters->nextPageUrl() }}" class="px-3 py-2 text-blue-500 bg-gray-100 hover:bg-gray-200 rounded">Next &raquo;</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="px-3 py-2 text-gray-500 bg-gray-200 rounded">Next &raquo;</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</div>
</div>
@endsection
