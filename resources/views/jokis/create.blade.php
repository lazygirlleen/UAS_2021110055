@extends('layouts.app')

@section('title', 'Input New Top Up')

@section('content')
<div class="p-5 text-center font-bold text-2xl">
    <h1 class="text-green text-3xl">Joki</h1>
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
            <div>
                <label for="id" class="block font-medium text-gray-700">Account ID</label>
                <input name="id" id="id" class="mt-1 p-2 border border-gray-300 rounded-lg w-full" required value="{{ old('id') }}">
            </div>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <h5 class="font-semibold text-lg mb-4">Choose Your Joki Type</h5>
            <div class="mb-4">
                <label for="joki_type" class="block font-medium text-gray-700">Type</label>
                <select class="mt-1 p-2 border border-gray-300 rounded-lg w-full" id="joki_type" name="joki_type" required>
                    <option value="" disabled selected>Select Type</option>
                    <option value="Daily" {{ old('joki_type') == 'Daily' ? 'selected' : '' }}>Daily Quest</option>
                    <option value="Character" {{ old('joki_type') == 'Character' ? 'selected' : '' }}>Character Material</option>
                    <option value="Weapon" {{ old('joki_type') == 'Weapon' ? 'selected' : '' }}>Weapon Material</option>
                </select>
            </div>


            <div>
</div>

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

        <button type="submit" class="mt-3 py-2 px-4 bg-green text-white font-semibold rounded-md hover:bg-white  focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">Pay Now</button>
    </form>
</div>
@endsection
