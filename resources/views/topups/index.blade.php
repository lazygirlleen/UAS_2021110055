@extends('layouts.app')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>Top Up</h1>
        <a href="{{ route('topups.create') }}" class="btn btn-primary btn-sm">Click Here</a>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success mt-4">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="container mt-2">
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($topups as $topup)
                    <tr>
                        <th scope="row">{{ $topup->id }}</th>
                        <td>{{ $topup->topup_type }}</td>
                        <td>{{ Str::limit($topup->description, 50, ' ...') }}</td>
                        <td>{{ $topup->price }}</td>
                        <td>{{ $topup->transaction_date }}</td>
                        <td>{{ $topup->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No Top Up History found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $topups->links() !!}
        </div>
    </div>
@endsection
