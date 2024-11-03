@extends('layouts.app')

@section('title', 'List')

@section('content')
<div class="mt-4 p-5 bg-black text-white rounded-lg shadow">
    <h1>All Characters</h1>
    <a href="{{ route('characters.create') }}" class="btn btn-primary btn-sm">Add New Character</a>


</div>

@if (session()->has('success'))
    <div class="alert alert-success mt-4">{{ session()->get('success') }}</div>
@endif


<div class="container mt-5">
    <table class="table mb-5">
        <thead>
            <tr class="hover:bg-gray-50">
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Rarity</th>
                <th scope="col">Element</th>
                <th scope="col">Weapon</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @forelse ($characters as $character)
                <tr>
                    <th scope="row">{{ $character->id }}</th>
                    <td><a href="{{ route('characters.show', $character) }}">{{ $character->name }}</a></td>
                    <td class="font-medium text-gray-900">{{ $character->rarity }}</td>
                    <td class="font-medium text-gray-900">{{ $character->element }}</td>
                    <td class="font-medium text-gray-900">{{ $character->type }}</td>
                    <td class="font-medium text-gray-900">{{ $character->created_at }}</td>
                    <td class="font-medium text-gray-900">{{ $character->updated_at }}</td>
                    <td>
                        <a href="{{ route('characters.edit', $character) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('characters.destroy', $character) }}" method="POST" class="d-inline-block">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">No character found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        <nav class="mt-4">
            <ul class="pagination">

                @if ($characters->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">&laquo; Previous</span></li>
                @else
                    <li class="page-item">
                        <a href="{{ $characters->previousPageUrl() }}" class="page-link text-blue-500 hover:text-blue-700">&laquo; Previous</a>
                    </li>
                @endif


                @foreach ($characters->links()->elements[0] as $page => $url)
                    @if ($page == $characters->currentPage())
                        <li class="page-item active"><span class="page-link bg-blue-500 text-white">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a href="{{ $url }}" class="page-link text-blue-500 hover:text-blue-700">{{ $page }}</a></li>
                    @endif
                @endforeach


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
