<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Joki;
use App\Models\Topup;
use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;

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

    // app/Http/Controllers/JokiController.php

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'account_id' => 'required|array',
            'topup_type' => 'required|string',
            'package' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        $selectedPackage = $request->input('package');
        $price = str_replace('.', '', $request->input('price', 0));

        $topup = Topup::create([
            'account_id' => implode(',', $request->account_id), // Jika banyak
            'topup_type' => $request->topup_type,
            'package' => $selectedPackage,
            'payment_method' => $request->payment_method,
            'total_price' => $price,
        ]);

        $paymentCode = strtoupper(uniqid('PAY-'));

        return view('payment.show', [
            'transaction' => $topup,
            'paymentCode' => $paymentCode
        ]);
    }

    public function confirmPayment($id)
    {
        $topup = Topup::findOrFail($id);

        // Lakukan proses pembayaran (simulasi)
        $topup->status = 'paid'; // Asumsi ada kolom `status` di tabel topup
        $topup->save();

        return redirect()->back()->with('success', 'Payment successfully confirmed!');
    }

    public function destroy(Topup $topup)
    {
        $topup->delete();
        return redirect()->route('topups.index')->with('success', 'Topup successfully deleted!');
    }
}
