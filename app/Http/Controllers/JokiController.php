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

    // app/Http/Controllers/JokiController.php

public function store(Request $request)
{
    // Validasi data
    $validated = $request->validate([
        'account_id' => 'required|exists:accounts,id', // Ensure account_id exists in the accounts table
        'joki_type' => 'required|string',
        'payment_method' => 'required|string',
    ]);

    // Simpan data Joki
    $joki = Joki::create([
        'account_id' => $validated['account_id'],  // Set the account_id for the Joki
        'joki_type' => $validated['joki_type'],
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
            'order_id' => $joki->id,
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
        return view('jokis.payment', [
            'snapToken' => $snapToken,
            'joki' => $joki,
        ]);
    } catch (\Exception $e) {
        return redirect()->route('jokis.index')->with('error', 'Failed to create transaction: ' . $e->getMessage());
    }
}


    public function destroy(Joki $joki)
    {
        $joki->delete();
        return redirect()->route('jokis.index')->with('success', 'Joki successfully deleted!');
    }
}
