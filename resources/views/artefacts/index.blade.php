@extends('layouts.app')

@section('content')
<div class="p-5 text-center font-bold text-2xl">
    <h1 class="text-green text-3xl">All Artefacts</h1>
</div>

@if (session()->has('success'))
    <div class="bg-green-100 text-green-800 p-4 rounded-lg mt-4 text-center">
        {{ session()->get('success') }}
    </div>
@endif

<div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
        @forelse ($artefacts as $artefact)
            <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition-transform hover:scale-105">
                <div class="p-4">
                    <h5 class="text-sm font-bold text-gray-500 mb-2">#{{ Str::padLeft($artefact->id, 4, '0') }}</h5>
                    <a href="{{ route('weapons.show', $artefact->id) }}" class="text-lg font-semibold text-gray-800 hover:text-blue-600">
                        {{ $artefact->set }}
                    </a>
                    <p class="text-base text-gray-700 mt-2">{{ $artefact->rarity }}</p>
                    <span class="inline-block mt-2 px-3 py-1 text-sm font-medium bg-green-100 text-green-800 rounded-full">
                        {{ $artefact->rarity }} Star
                    </span>
                    <p class="text-base text-gray-700 mt-2">{{ $artefact->set_bonus }}</p>
                    <span class="inline-block mt-2 px-3 py-1 text-sm font-medium bg-green-100 text-green-800 rounded-full">
                        {{ $artefact->set_bonus }}
                    </span>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <p class="text-center text-gray-600">No Artefact found.</p>
            </div>
        @endforelse
    </div>

    <div class="flex justify-center mt-8">
        <nav>
            <ul class="inline-flex items-center space-x-1">
                {{-- Previous Page Link --}}
                @if ($artefacts->onFirstPage())
                    <li class="page-item disabled">
                        <span class="px-3 py-2 text-gray-500 bg-gray-200 rounded">&laquo; Previous</span>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{ $artefacts->previousPageUrl() }}" class="px-3 py-2 text-blue-500 bg-gray-100 hover:bg-gray-200 rounded">&laquo; Previous</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($artefacts->links()->elements[0] as $page => $url)
                    @if ($page == $artefacts->currentPage())
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
                @if ($artefacts->hasMorePages())
                    <li class="page-item">
                        <a href="{{ $artefacts->nextPageUrl() }}" class="px-3 py-2 text-blue-500 bg-gray-100 hover:bg-gray-200 rounded">Next &raquo;</a>
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
