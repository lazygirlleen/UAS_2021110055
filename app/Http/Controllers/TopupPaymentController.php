<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopupPaymentController extends Controller
{
    public function showPaymentForm()
    {
        // Data akun (contoh dari database)
        $accounts = [
            (object)['id' => 1, 'name' => 'Account 1'],
            (object)['id' => 2, 'name' => 'Account 2'],
        ];

        // Paket Topup (contoh data)
        $topupPackages = [
            ['id' => 't1', 'name' => '60 Genesis Crystals', 'price' => 14865],
            ['id' => 't2', 'name' => '330 Genesis Crystals', 'price' => 72973],
        ];

        return view('payments.create', compact('accounts', 'topupPackages'));
    }

    public function processPayment(Request $request)
    {
        $validated = $request->validate([
            'account_id' => 'required',
            'transaction_type' => 'required',
            'package_id' => 'required',
            'payment_method' => 'required',
        ]);

        // Fetch the Topup package price
        $topupPackages = [
            ['id' => 't1', 'name' => '60 Genesis Crystals', 'price' => 14865],
            ['id' => 't2', 'name' => '330 Genesis Crystals', 'price' => 72973],
        ];
        $selectedPackage = collect($topupPackages)->firstWhere('id', $validated['package_id']);

        $totalPrice = $selectedPackage ? $selectedPackage['price'] : 0;

        // Simulate saving the transaction
        $transaction = [
            'id' => uniqid('TXN-'),
            'account_id' => $validated['account_id'],
            'transaction_type' => $validated['transaction_type'],
            'package_id' => $validated['package_id'],
            'payment_method' => $validated['payment_method'],
            'total_price' => $totalPrice,
        ];

        // Redirect to the confirmation page with the transaction data
        return redirect()->route('payment.show', ['transaction' => $transaction]);
    }

    public function showPaymentPage(Request $request)
    {
        // Transaksi yang dikirim dari halaman sebelumnya
        $transaction = $request->get('transaction');

        // Generate kode pembayaran
        $paymentCode = strtoupper(uniqid('PAY-'));

        return view('payments.confirm', compact('transaction', 'paymentCode'));
    }

    public function confirmPayment(Request $request)
    {
        // Simulasi pembayaran berhasil
        $paymentCode = $request->input('payment_code');
        return redirect()->route('payments.index')->with('success', "Pembayaran dengan kode $paymentCode berhasil!");
    }
}
