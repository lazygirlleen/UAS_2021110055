@extends('layouts.app')

@section('content')
<div class="mt-4 p-5 text-center font-bold py-4 uppercase">
  <h1>Top Up Transaction</h1>
  <a href="{{ route('topups.create') }}" class="btn btn-primary btn-sm mt-2">Create New Transaction</a>
</div>

@if (session()->has('success'))
  <div class="alert alert-success mt-4">
    {{ session()->get('success') }}
  </div>
@endif

<div class="container mt-5">
  <table class="table table-bordered mb-5">
    <thead>
      <tr class="table-success">
        <th scope="col">#</th>  

        <th scope="col">Top Up Type</th>
        <th scope="col">Price</th>
        <th scope="col">Transaction Date</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($topups as $topup)
        <tr>
          <th scope="row">{{ $topup->id }}</th>
          <td>{{ $topup->topup_type }}</td>
          <td>{{ $topup->price }}</td>
          <td>{{ $topup->create_at }}</td>
          <td>{{ $topup->status }}</td>
        </tr>
      @empty
        <tr>
          <td colspan="6" class="text-center">No Top Up History found.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
  <div class="d-flex justify-content-center mt-4">
        <nav>
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($topups->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">&laquo; Previous</span></li>
                @else
                    <li class="page-item">
                        <a href="{{ $topups->previousPageUrl() }}" class="page-link text-blue-500 hover:text-blue-700">&laquo; Previous</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($topups->links()->elements[0] as $page => $url)
                    @if ($page == $topups->currentPage())
                        <li class="page-item active"><span class="page-link bg-blue-500 text-white">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a href="{{ $url }}" class="page-link text-blue-500 hover:text-blue-700">{{ $page }}</a></li>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($topups->hasMorePages())
                    <li class="page-item">
                        <a href="{{ $topups->nextPageUrl() }}" class="page-link text-blue-500 hover:text-blue-700">Next &raquo;</a>
                    </li>
                @else
                    <li class="page-item disabled"><span class="page-link">Next &raquo;</span></li>
                @endif
            </ul>
        </nav>
    </div>
</div>
@endsection
