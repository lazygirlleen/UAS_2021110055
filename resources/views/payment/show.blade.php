@extends('layouts.app')

@section('title', 'Payment Confirmation')

@section('content')
<div class="p-5 text-center font-bold text-2xl">
    <h1 class="text-teal text-3xl">Confirm Your Payment</h1>
</div>

<div class="max-w-3xl mx-auto my-5">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h5 class="font-semibold text-lg mb-4">Transaction Details</h5>
        <p><strong>Transaction ID:</strong> {{ $transaction->id }}</p>
        <p><strong>Top Up Type:</strong> {{ $transaction->topup_type }}</p>
        <p><strong>Package:</strong> {{ $transaction->package }}</p>
        <p><strong>Payment Method:</strong> {{ $transaction->payment_method }}</p>
        <p><strong>Total Price:</strong> Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</p>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 mt-5">
        <h5 class="font-semibold text-lg mb-4">Payment Code</h5>
        <h3 class="text-xl font-bold">{{ $paymentCode }}</h3>
    </div>

    <form action="{{ route('payment.confirm', $transaction->id) }}" method="POST" class="mt-6">
        @csrf
        <button class="py-2 px-4 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-opacity-50">
            Confirm Payment
        </button>
    </form>
</div>

@if (session('success'))
    <div class="max-w-3xl mx-auto my-5">
        <div class="bg-green-100 text-green-800 p-4 rounded-lg">
            {{ session('success') }}
        </div>
    </div>
@endif
@endsection
