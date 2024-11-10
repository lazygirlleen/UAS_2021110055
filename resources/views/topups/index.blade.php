@extends('layouts.app')

@section('content')
<div class="mt-4 mb-3 p-5 text-center font-bold py-4">
    <h1 class="text-green text-3xl">Top Up Transactions</h1>
    <button class="mt-3 py-2 px-4 bg-green text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
    <a href="{{ route('topups.create') }}" class="btn btn-primary btn-sm">
        Create New Transaction
    </a>
    </button>
</div>


@if (session()->has('success'))
    <div class="bg-green-100 text-green-800 p-4 rounded-lg mt-4 mx-auto max-w-2xl">
        {{ session()->get('success') }}
    </div>
@endif

<div class="container mx-auto mt-5 px-4">
    <table class="min-w-full border border-gray-300 bg-white rounded-lg">
        <thead>
            <tr class="bg-gray-100 text-gray-700">
                <th class="py-2 px-4 border-b">#</th>
                <th class="py-2 px-4 border-b">Top Up Type</th>
                <th class="py-2 px-4 border-b">Package</th>
                <th class="py-2 px-4 border-b">Transaction Date</th>
                <th class="py-2 px-4 border-b">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($topups as $topup)
                <tr class="text-center">
                    <td class="py-2 px-4 border-b">{{ $topup->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $topup->topup_type }}</td>
                    <td class="py-2 px-4 border-b">{{ ($topup->package) }}</td>
                    <td class="py-2 px-4 border-b">{{ $topup->transaction_date }}</td>
                    <td class="py-2 px-4 border-b">{{ $topup->status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4">No Top Up History found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="flex justify-center mt-4">
        {{ $topups->links('pagination::tailwind') }}
    </div>
</div>
@endsection
