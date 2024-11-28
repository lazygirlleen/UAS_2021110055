@extends('layouts.app')

@section('title', 'Payment')

@section('content')
<div class="p-5 text-center font-bold text-2xl">
    <h1 class="text-teal text-3xl">Payment</h1>
</div>

<div class="max-w-3xl mx-auto my-5">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h5 class="font-semibold text-lg mb-4">Transaction Details</h5>
        <p>Type: {{ $joki->joki_type }}</p>
        <p>Payment Method: {{ $joki->payment_method }}</p>
        <p>Total Price: Rp {{ number_format($joki->price, 0, ',', '.') }}</p>

    </div>

    <button id="pay-button" class="bg-teal-600 text-white px-6 py-2 rounded-md hover:bg-teal-700">
        Pay Now
    </button>
</div>

<script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script type="text/javascript">
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        snap.pay('{{ $snapToken }}');
    });
</script>
@endsection
