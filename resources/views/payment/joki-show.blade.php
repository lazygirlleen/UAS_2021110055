@extends('layouts.app')

@section('title', 'Joki Payment Confirmation')

@section('content')
<div class="p-5 text-center font-bold text-2xl">
    <h1 class="text-teal text-3xl">Confirm Your Joki Payment</h1>
</div>

<div class="max-w-3xl mx-auto my-5">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h5 class="font-semibold text-lg mb-4">Transaction Details</h5>
        <p><strong>Transaction ID:</strong> {{ $transaction->id }}</p>
        <p><strong>Joki Type:</strong> {{ $transaction->joki_type }}</p>
        <p><strong>Payment Method:</strong> {{ $transaction->payment_method }}</p>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 mt-5">
        <h5 class="font-semibold text-lg mb-4">Payment Code</h5>
        <h3 class="text-xl font-bold">{{ $paymentCode }}</h3>
    </div>

    <!-- Payment Steps Section -->
    <div class="bg-white shadow-md rounded-lg p-6 mt-5">
        <h5 class="font-semibold text-lg mb-4">How to Pay Using the Payment Code</h5>
        <ol class="list-decimal list-inside space-y-3">
            <li><strong>Step 1:</strong> Open the payment app or website of your chosen payment method (E-Wallet or Bank Transfer).</li>
            <li><strong>Step 2:</strong> Select the "Pay" or "Transfer" option and look for the "Payment Code" or "Code" section.</li>
            <li><strong>Step 3:</strong> Enter the payment code: <span class="font-bold text-teal">{{ $paymentCode }}</span>.</li>
            <li><strong>Step 4:</strong> Enter the total price.</li>
            <li><strong>Step 5:</strong> Complete the payment and wait for the confirmation.</li>
            <li><strong>Step 6:</strong> Once payment is successful, click "Confirm Payment" below to complete the transaction.</li>
        </ol>
    </div>
    <form action="{{ route('payment.joki.confirm', $transaction->id) }}" method="POST">
    @csrf
    <button type="submit" class="py-2 px-4 bg-teal text-white font-semibold rounded-md hover:bg-green-700 mt-3">
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
