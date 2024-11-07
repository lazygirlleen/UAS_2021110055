@extends('layouts.app')

@section('content')
    <div class="mt-4 p-5 bg-black text-white">
        <h1>All Weapons</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success mt-4">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="container">
        <div class="row g-4 mt-4">
        @forelse ($weapons as $weapon)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">

                        <h5 class="card-title">{{ '#' . Str::padLeft($weapon->id, 4, '0') }}</h5>

                        <a href="{{ route('weapons.show', $weapon->id) }}" class="stretched-link">
                            <h5 class="card-title">{{ $weapon->name }}</h5>
                        </a>

                        <p class="card-text">{{ $weapon->weapon_type }}</p>
                        <p class="card-text badge rounded-pill bg-success">{{ $weapon->rarity }} star</p>
                    </div>
                </div>
            </div>

        @empty
            <div class="col-12">
                <p class="text-center">No Weapon found.</p>
            </div>
        @endforelse

        <div class="d-flex justify-content-center">
        <nav class="mt-4">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($weapons->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">&laquo; Previous</span></li>
                @else
                    <li class="page-item">
                        <a href="{{ $weapons->previousPageUrl() }}" class="page-link text-blue-500 hover:text-blue-700">&laquo; Previous</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($weapons->links()->elements[0] as $page => $url)
                    @if ($page == $weapons->currentPage())
                        <li class="page-item active"><span class="page-link bg-blue-500 text-white">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a href="{{ $url }}" class="page-link text-blue-500 hover:text-blue-700">{{ $page }}</a></li>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($weapons->hasMorePages())
                    <li class="page-item">
                        <a href="{{ $weapons->nextPageUrl() }}" class="page-link text-blue-500 hover:text-blue-700">Next &raquo;</a>
                    </li>
                @else
                    <li class="page-item disabled"><span class="page-link">Next &raquo;</span></li>
                @endif
            </ul>
        </nav>
    </div>
    </div>
@endsection
