<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Joki;
use Illuminate\Http\Request;

class JokiController extends Controller
{
    public function index()
    {
        $jokis = Joki::paginate(10);
        return view('jokis.index', compact('jokis'));
    }

    public function create()
    {
        $accounts = Account::all();
        return view('jokis.create', compact('accounts'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'account_id' => 'required|array',
            'joki_type' => 'required|string',
            'payment_method' => 'required|string',
        ]);



        // Simpan transaksi Joki
        $joki = Joki::create([
            'account_id' => implode(',', $request->account_id),
            'joki_type' => $request->joki_type,
            'payment_method' => $request->payment_method,
        ]);

        $paymentCode = strtoupper(uniqid('PAY-'));

        // Redirect ke halaman konfirmasi pembayaran Joki
        return view('payment.joki-show', [
            'transaction' => $joki,
            'paymentCode' => $paymentCode
        ]);
    }

    public function confirmJokiPayment($id)
    {
        $joki = Joki::findOrFail($id);

        if ($joki->status === 'paid') {
            return redirect()->back()->withErrors('Payment already confirmed!');
        }

        $joki->status = 'paid';
        $joki->save();

        return redirect()->route('jokis.index')->with('success', 'Payment successfully confirmed!');
    }


}
