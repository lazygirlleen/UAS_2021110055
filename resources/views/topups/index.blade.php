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
