@extends('layouts.app')

@section('title', 'Input New Top Up Transaction')

@section('content')
<div class="p-5 text-center font-bold text-2xl">
    <h1 class="text-teal text-3xl">Topup</h1>
</div>

<div class="max-w-3xl mx-auto my-5">
    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-4 rounded-lg mb-6">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('topups.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

    <!-- Account Selection -->
    <div class="bg-white shadow-md rounded-lg p-5">
            <h5 class="font-semibold text-lg mb-4">Insert Your ID</h5>
            <select class="block w-full border border-gray-300 rounded-md p-2" name="account_id[]" multiple required>
                @foreach ($accounts as $account)
                    <option value="{{ $account->id }}">{{ $account->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Package Selection -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h5 class="font-semibold text-lg mb-4">Choose Your Top Up</h5>
            <div>
                <label for="topup_type" class="block font-medium text-gray-700">Type</label>
                <select class="mt-1 p-2 border border-gray-300 rounded-lg w-full" id="topup_type" name="topup_type" required>
                    <option value="" disabled selected>Select Type</option>
                    <option value="Welkin" {{ old('topup_type') == 'Welkin' ? 'selected' : '' }}>Welkin Moon</option>
                    <option value="Genesis" {{ old('topup_type') == 'Genesis' ? 'selected' : '' }}>Genesis Crystal</option>
                </select>
            </div>

            <div>
    <label for="package" class="block font-medium text-gray-700 mt-3">Package</label>
    <select class="mt-1 p-2 border border-gray-300 rounded-lg w-full" id="package" name="package" required>
        <option value="" disabled selected>Select Package</option>
        <option value="60_Genesis_Crystals" data-price="14.865">60 Genesis Crystals</option>
        <option value="330_Genesis_Crystals" data-price="72.973">300+30 Genesis Crystals</option>
        <option value="1090_Genesis_Crystals" data-price="229.730">980+110 Genesis Crystals</option>
        <option value="2240_Genesis_Crystals" data-price="440.541">1980+260 Genesis Crystals</option>
        <option value="3880_Genesis_Crystals" data-price="734.234">3280+600 Genesis Crystals</option>
        <option value="8080_Genesis_Crystals" data-price="1.467.568">6480+1600 Genesis Crystals</option>
        <option value="Welkin_Moon" data-price="65.000">Blessing of the Welkin Moon</option>
    </select>
</div>
</div>

        <!-- Payment Method Selection -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h5 class="font-semibold text-lg mb-4">Choose Your Payment Method</h5>
            <div>
                <label for="payment_method" class="block font-medium text-gray-700">Payment Method</label>
                <select class="mt-1 p-2 border border-gray-300 rounded-lg w-full" id="payment_method" name="payment_method" required>
                    <option value="" disabled selected>Select Method</option>
                    <option value="E-Wallet" {{ old('payment_method') == 'E-Wallet' ? 'selected' : '' }}>E-Wallet</option>
                    <option value="Transfer_Bank" {{ old('payment_method') == 'Transfer_Bank' ? 'selected' : '' }}>Transfer Bank</option>
                </select>
            </div>
        </div>

        <!-- Display Price -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h5 class="font-semibold text-lg mb-4">Total Price</h5>
            <div id="price-display" class="text-xl font-bold text-teal">Rp 0</div>
        </div>

        <button type="submit" class="mt-3 py-2 px-4 bg-teal text-white font-semibold rounded-md hover:bg-pink focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">Pay Now</button>
    </form>
</div>

<script>
    // Update the displayed price based on the selected package
    document.getElementById('package').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var price = selectedOption.getAttribute('data-price');
        document.getElementById('price-display').innerText = 'Rp ' + price;
    });
</script>

@endsection
