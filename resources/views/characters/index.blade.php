@extends('layouts.app')

@section('content')
<div class="mt-4 p-5 text-center font-bold py-4 uppercase">
    <h1>All Characters</h1>
    <a href="{{ route('characters.create') }}" class="btn btn-primary btn-sm">Add New Character</a>
</div>

@if (session()->has('success'))
    <div class="alert alert-success mt-4">
        {{ session()->get('success') }}
    </div>
@endif

<div class="container">
    <div class="row g-4 mt-4">
        @forelse ($characters as $character)
            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center w-96 flex flex-col rounded-xl bg-gray-800 text-gray-700">
                    <div class="card-body">
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
