@extends('layouts.app')

@section('title', 'Input New Joki Transaction')

@section('content')
<div class="p-5 text-center font-bold text-2xl">
    <h1 class="text-teal text-3xl">Joki</h1>
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

    <form action="{{ route('jokis.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="bg-white shadow-md rounded-lg p-5">
            <h5 class="font-semibold text-lg mb-4">Insert Your ID</h5>
            <select class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="characters[]" multiple>
                @foreach ($accounts as $account)
                    <option value="{{ $account->name }}">
                        {{ $account->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <h5 class="font-semibold text-lg mb-4">Choose Your Joki Type</h5>
            <div class="mb-4">
                <label for="joki_type" class="block font-medium text-gray-700">Type</label>
                <select class="mt-1 p-2 border border-gray-300 rounded-lg w-full" id="joki_type" name="joki_type" required>
                    <option value="" disabled selected>Select Type</option>
                    <option value="Daily" data-price="100" {{ old('joki_type') == 'Daily' ? 'selected' : '' }}>Daily Quest</option>
                    <option value="Character" data-price="200" {{ old('joki_type') == 'Character' ? 'selected' : '' }}>Character Material</option>
                    <option value="Weapon" data-price="300" {{ old('joki_type') == 'Weapon' ? 'selected' : '' }}>Weapon Material</option>
                </select>
            </div>
        </div>

        <!-- Display Price -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h5 class="font-semibold text-lg mb-4">Total Price</h5>
            <div id="price-display" class="text-xl font-bold text-teal">Rp 0</div>
        </div>

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

        <button type="submit" class="mt-3 py-2 px-4 bg-teal text-white font-semibold rounded-md hover:bg-white focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">Pay Now</button>
    </form>
</div>

<script>
    // Update the displayed price based on the selected Joki type
    document.getElementById('joki_type').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var price = selectedOption.getAttribute('data-price');
        document.getElementById('price-display').innerText = 'Rp ' + price;
    });
</script>

@endsection
