@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-2xl font-bold text-center mb-5 text-teal-600">Payment Page</h1>

    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-5" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">Transaction Details</h2>
        <p class="text-gray-600"><strong>Joki Type:</strong> {{ $joki->joki_type }}</p>
        <p class="text-gray-600"><strong>Payment Method:</strong> {{ $joki->payment_method }}</p>
        <p class="text-gray-600"><strong>Order ID:</strong> {{ $joki->id }}</p>
        <p class="text-gray-600"><strong>Amount:</strong> Rp 100,000</p>

        <div class="mt-5">
            <button id="pay-button" class="px-4 py-2 bg-teal-600 text-white font-semibold rounded-md hover:bg-teal-700">
                Proceed to Payment
            </button>
        </div>
    </div>
</div>

<!-- Include Midtrans Snap.js -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

<script>
    // Configure the Pay Button
    document.getElementById('pay-button').addEventListener('click', function () {
        snap.pay('{{ $snapToken }}', {
            onSuccess: function (result) {
                alert("Payment success!"); // Optional: replace with your success logic
                console.log(result);
                // Redirect or update payment status
                window.location.href = "{{ route('jokis.index') }}";
            },
            onPending: function (result) {
                alert("Payment pending!"); // Optional: replace with your pending logic
                console.log(result);
                // Optionally handle pending status
            },
            onError: function (result) {
                alert("Payment error!"); // Optional: replace with your error logic
                console.log(result);
                // Optionally handle error status
            },
            onClose: function () {
                alert("You closed the payment window.");
                // Optionally handle when user closes the payment window
            }
        });
    });
</script>
@endsection
