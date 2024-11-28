<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Joki;
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

    // app/Http/Controllers/JokiController.php

public function store(Request $request)
{
    // Validasi data
    $validated = $request->validate([
        'account_id' => 'required|exists:accounts,id', // Ensure account_id exists in the accounts table
        'topup_type' => 'required|string',
        'package' => 'required|string',
        'payment_method' => 'required|string',
    ]);

    // Simpan data Joki
    $topup = Topup::create([
        'account_id' => $validated['account_id'],  // Set the account_id for the Joki
        'topup_type' => $validated['topup_type'],
        'package' => $validated['package'],
        'payment_method' => $validated['payment_method'],
    ]);

    // Konfigurasi Midtrans
    \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
    \Midtrans\Config::$isProduction = false; // Change to true for production
    \Midtrans\Config::$isSanitized = true;
    \Midtrans\Config::$is3ds = true;

    // Data untuk transaksi
    $params = [
        'transaction_details' => [
            'order_id' => $topup->id,
            'gross_amount' => 100000, // Example transaction amount (adjust as needed)
        ],
        'customer_details' => [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@example.com',
            'phone' => '081234567890',
        ],
    ];

    // Create Snap Token
    try {
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // Redirect to payment page or show the token
        return view('topups.payment', [
            'snapToken' => $snapToken,
            'topup' => $topup,
        ]);
    } catch (\Exception $e) {
        return redirect()->route('topups.index')->with('error', 'Failed to create transaction: ' . $e->getMessage());
    }
}


    public function destroy(Topup $topup)
    {
        $topup->delete();
        return redirect()->route('topups.index')->with('success', 'Topup successfully deleted!');
    }
}
