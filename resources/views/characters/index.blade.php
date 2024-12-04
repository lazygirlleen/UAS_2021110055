@extends('layouts.app')

@section('content')
<div class="p-5 text-center font-bold py-4 text-teal">
    <h1 class="text-teal text-3xl">All Characters</h1>
    <button class="mt-3 py-2 px-4 bg-teal text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
        <a href="{{ route('characters.create') }}" class="btn btn-primary btn-sm">
            Add New Character
        </a>
    </button>
</div>

@if (session()->has('success'))
    <div class="flex items-center justify-between p-4 bg-green-600 text-teal rounded-lg shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105">
        <div class="flex items-center space-x-3">
            <!-- Success Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-teal" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M5 12a7 7 0 1114 0 7 7 0 01-14 0z" />
            </svg>
            <p class="text-sm font-medium">{{ session()->get('success') }}</p>
        </div>
        <button class="ml-4 text-teal hover:text-blue focus:outline-none" onclick="this.parentElement.style.display='none'">
            <!-- Close Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
@endif

<div class="container mx-auto px-4">
    @php
        // Group characters by nation
        $groupedCharacters = $characters->groupBy('nation');
    @endphp

    @foreach ($groupedCharacters as $nation => $charactersInNation)
        <div class="mt-8">
            <h2 class="text-2xl font-semibold text-teal">{{ $nation }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                @foreach ($charactersInNation as $character)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition-transform hover:scale-105">
                        <div class="bg-gray-500 rounded-t-lg overflow-hidden">
                            @if ($character->avatar)
                                <img src="{{ $character->avatar_url }}" alt="{{ $character->name }}" class="w-full h-48 object-cover">
                            @endif
                        </div>
                        <div class="p-4">
                            <h5 class="text-xl font-bold text-gray-900">{{ $character->name }}</h5>
                            <p class="text-base text-gray-700">{{ $character->element }}</p>
                            <span class="inline-block mt-2 px-3 py-1 text-sm font-medium bg-green-100 text-green-800 me-2 rounded dark:bg-green-900 dark:text-green-300">
                                {{ $character->rarity }} Star
                            </span>
                            <div class="mt-4">
                                <button class="mt-3 py-2 px-4 bg-teal text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
                                    <a href="{{ route('characters.show', $character->id) }}" >Detail</a>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach

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
                            <span class="px-3 py-2 bg-blue-500 text-teal text-bold rounded">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a href="{{ $url }}" class="px-3 py-2 text-pink text-bold bg-gray-100 hover:bg-gray-200 rounded">{{ $page }}</a>
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
@endsection
