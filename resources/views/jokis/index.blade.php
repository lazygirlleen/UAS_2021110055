@extends('layouts.app')

@section('content')
<div class="mt-4 mb-3 p-5 text-center font-bold py-4">
    <h1 class="text-teal text-3xl">Joki Transactions</h1>
    <button class="mt-3 py-2 px-4 bg-teal text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
    <a href="{{ route('jokis.create') }}" class="btn btn-primary btn-sm">
        Create New Transaction
    </a>
    </button>
</div>


@if (session()->has('success'))
<div id="success-dialog" class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" onclick="closeDialog()">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div
            class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
            <div class="sm:flex sm:items-start">
                <div
                    class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                    <svg class="h-6 w-6 text-green-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Your Transaction Has Been Success
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div class="container mx-auto mt-5 px-4">
    <table class="min-w-full border border-gray-300 bg-white rounded-lg">
        <thead>
            <tr class="bg-gray-100 text-gray-700">
                <th class="py-2 px-4 border-b">#</th>
                <th class="py-2 px-4 border-b">Joki Type</th>
                <th class="py-2 px-4 border-b">Transaction Date</th>
                <th class="py-2 px-4 border-b">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($jokis as $joki)
                <tr class="text-center">
                    <td class="py-2 px-4 border-b">{{ $joki->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $joki->joki_type }}</td>
                    <td class="py-2 px-4 border-b">{{ $joki->transaction_date }}</td>
                    <td class="py-2 px-4 border-b">{{ $joki->status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4">No Joki History found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="flex justify-center mt-8">
        <nav>
            <ul class="inline-flex items-center space-x-1">
                {{-- Previous Page Link --}}
                @if ($jokis->onFirstPage())
                    <li class="page-item disabled">
                        <span class="px-3 py-2 text-gray-500 bg-gray-200 rounded">&laquo; Previous</span>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{ $jokis->previousPageUrl() }}" class="px-3 py-2 text-blue-500 bg-gray-100 hover:bg-gray-200 rounded">&laquo; Previous</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($jokis->links()->elements[0] as $page => $url)
                    @if ($page == $jokis->currentPage())
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
                @if ($jokis->hasMorePages())
                    <li class="page-item">
                        <a href="{{ $jokis->nextPageUrl() }}" class="px-3 py-2 text-blue-500 bg-gray-100 hover:bg-gray-200 rounded">Next &raquo;</a>
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
</div>
</div>

<script>
    function closeDialog() {
        const dialog = document.getElementById('success-dialog');
        if (dialog) {
            dialog.style.display = 'none';
        }
    }
    setTimeout(() => {
        closeDialog();
    }, 5000);
</script>
@endsection
