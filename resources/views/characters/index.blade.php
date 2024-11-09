@extends('layouts.app')

@section('content')
<div class="p-5 text-center font-bold py-4 text-green">
    <h1 class="text-green text-3xl">All Characters</h1>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
        <a href="{{ route('characters.create') }}">Add New Character</a>
    </button>
</div>


@if (session()->has('success'))
    <div class="alert alert-success mt-4">
        {{ session()->get('success') }}
    </div>
@endif

<div class="container">
    <div class="row g-4 mt-4">
        @forelse ($characters as $character)
        <div class="container mx-auto mb-3">
            <div class="col-md-4 mb-4">
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <div class="card-body">
        <div class="bg-gray-500 rounded-lg transition-transform transform  duration-300 mb-3">
                    @if ($character->avatar)
                        <img src="{{ $character->avatar_url }}" class="rounded img-thumbnail mx-auto d-block my-3" alt="{{ $character->name }}" />
                    @endif
                        <a>
                            <h5 class="mb-2 text-xl font-bold dark:text-black">{{ $character->name }}</h5>
                        </a>
                        <p class="card-text text-base font-light">{{ $character->nation }}</p>
                        <p class="card-text text-base font-light">{{ $character->element }}</p>
                        <p class="badge bg-success">{{ $character->rarity }} Star</p>
                        <p><button class=" btn btn-light btn-sm text-white">
                            <a href="{{ route('characters.show', $character->id) }}">
                            Detail
                            </a>
                        </button></p>

                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">No Character found.</p>
            </div>
        @endforelse
    </div>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <nav>
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($characters->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">&laquo; Previous</span></li>
                @else
                    <li class="page-item">
                        <a href="{{ $characters->previousPageUrl() }}" class="page-link text-blue-500 hover:text-blue-700">&laquo; Previous</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($characters->links()->elements[0] as $page => $url)
                    @if ($page == $characters->currentPage())
                        <li class="page-item active"><span class="page-link bg-blue-500 text-white">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a href="{{ $url }}" class="page-link text-blue-500 hover:text-blue-700">{{ $page }}</a></li>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($characters->hasMorePages())
                    <li class="page-item">
                        <a href="{{ $characters->nextPageUrl() }}" class="page-link text-blue-500 hover:text-blue-700">Next &raquo;</a>
                    </li>
                @else
                    <li class="page-item disabled"><span class="page-link">Next &raquo;</span></li>
                @endif
            </ul>
        </nav>
    </div>
</div>
@endsection
