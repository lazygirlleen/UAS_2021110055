@extends('layouts.app')

@section('content')
    <div class="mt-4 p-5 bg-black text-white">
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
                <div class="card h-100">
                    <div class="card-body">

                        <h5 class="card-title">{{ '#' . Str::padLeft($character->id, 4, '0') }}</h5>

                        <a href="{{ route('characters.show', $character->id) }}" class="stretched-link">
                            <h5 class="card-title">{{ $character->name }}</h5>
                        </a>

                        <p class="card-text">{{ $character->element }}</p>
                        <p class="card-text">{{ $character->weapon_type }}</p>
                        <p class="card-text badge rounded-pill bg-success">{{ $character->rarity }} Star</p>


                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">No Character found.</p>
            </div>
        @endforelse

        <div class="d-flex justify-content-center">
        <nav class="mt-4">
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
