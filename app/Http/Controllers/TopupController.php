<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Topup;
use Illuminate\Http\Request;

class TopupController extends Controller
{
    public function index()
    {
        $topups = Topup::paginate(10);
        return view('topups.index', compact('topups'));
    }

    public function create()
    {
        $accounts = Account::all();
        return view('topups.create', compact('accounts'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'account_id' => 'required|array',
            'topup_type' => 'required|string',
            'package' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        $price = str_replace('.', '', $request->input('price', 0));

        // Simpan transaksi Topup
        $topup = Topup::create([
            'account_id' => implode(',', $request->account_id),
            'topup_type' => $request->topup_type,
            'package' => $request->package,
            'payment_method' => $request->payment_method,
            'total_price' => $price,
        ]);

        $paymentCode = strtoupper(uniqid('PAY-'));

        // Redirect ke halaman konfirmasi pembayaran Topup
        return view('payment.topup-show', [
            'transaction' => $topup,
            'paymentCode' => $paymentCode
        ]);
    }

    public function confirmTopUpPayment($id)
    {
        // Temukan data top-up berdasarkan ID
        $topup = Topup::findOrFail($id);

        // Periksa apakah pembayaran sudah dikonfirmasi
        if ($topup->status === 'paid') {
            return redirect()->back()->withErrors('Payment already confirmed!');
        }

        // Set status menjadi "paid"
        $topup->status = 'paid';
        $topup->save();

        // Redirect ke halaman yang sesuai
        return redirect()->route('topups.index')->with('success', 'Payment successfully confirmed!');
    }
}
