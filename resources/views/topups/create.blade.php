@extends('layouts.app')

@section('title', 'Input New Top Up')

@section('content')
<div class="mt-4 p-5 text-center font-bold py-4 uppercase">

<h1>Top Up</h1>
</div>

<div class="row my-5">
  <div class="col-12 px-5">
    @if ($errors->any())
      <div class="alert alert-danger mt-3">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('topups.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="col mb-4">
          <div class="card h-100">
            <div class="card-body">
                <h5>Insert Your ID</h5>
                <div class="form-group mt-3">
                    <label for="id">Account ID</label>
                    <input name="id" id="id" class="form-control w-full" required value="{{ old('id') }}">
                </div>
            </div>
        </div>
        </div>

        <div class="col mb-4">
          <div class="card h-100">
            <div class="card-body">
                <h5>Choose Your Top Up</h5>
            <div class="form-group mt-3">
                <label for="topup_type">Type</label>
                <select class="form-select" id="topup_type" name="topup_type" required>
                <option value="" disabled selected>Select Type</option>
                <option value="Welkin" {{ old('topup_type') == 'Welkin' ? 'selected' : '' }}>Welkin Moon</option>
                <option value="Genesis" {{ old('topup_type') == 'Genesis' ? 'selected' : '' }}>Genesis Crystal</option>
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="amount">Amount</label>
                <input name="amount" id="amount" class="form-control w-full" required value="{{ old('amount') }}">
            </div>

            <div class="form-group mt-3">
                    <label for="package">Package</label>
                    <select class="form-select" id="package" name="package" required>
                    <option value="" disabled selected>Select Package</option>
                    <option value="E-Wallet" {{ old('package') == 'E-Wallet' ? 'selected' : '' }}>E-Wallet</option>
                    <option value="Transfer_Bank" {{ old('package') == 'Transfer_Bank' ? 'selected' : '' }}>Transfer Bank</option>
                    </select>
                </div>
            </div>
        </div>
        </div>

        <div class="col mb-4">
          <div class="card h-100">
            <div class="card-body">
            <h5>Choose Your Payment Method</h5>
                <div class="form-group mt-3">
                    <label for="payment_method">Payment Method</label>
                    <select class="form-select" id="payment_method" name="payment_method" required>
                    <option value="" disabled selected>Select Method</option>
                    <option value="E-Wallet" {{ old('payment_method') == 'E-Wallet' ? 'selected' : '' }}>E-Wallet</option>
                    <option value="Transfer_Bank" {{ old('payment_method') == 'Transfer_Bank' ? 'selected' : '' }}>Transfer Bank</option>
                    </select>
                </div>
            </div>
        </div>
        </div>

            <button type="submit" class="btn btn-primary btn-block mt-4">Pay Now</button>
        </form>
    </div>
</div>

@endsection
