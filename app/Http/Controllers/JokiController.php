<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Joki;
use Illuminate\Http\Request;
use Midtrans\Snap;

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
        $validated = $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'joki_type' => 'required|string',
            'payment_method' => 'required|string',
        ]);


        $joki = Joki::create([
            'account_id' => $validated['account_id'][0], // Ambil ID pertama dari array
            'joki_type' => $validated['joki_type'],
            'payment_method' => $validated['payment_method'],
           
        ]);

        return redirect()->route('jokis.payment', $joki->id);
    }


    public function payment(Joki $joki)
{
    // Pastikan Midtrans dikonfigurasi
    \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
    \Midtrans\Config::$isProduction = false;
    \Midtrans\Config::$isSanitized = true;
    \Midtrans\Config::$is3ds = true;

    // Buat ulang Snap Token berdasarkan Joki ID
    $params = [
        'transaction_details' => [
            'order_id' => $joki->id,
            'gross_amount' => $this->getPrice($joki->joki_type),
        ],
        'customer_details' => [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@example.com',
            'phone' => '081234567890',
        ],
    ];

    try {
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('jokis.payment', [
            'snapToken' => $snapToken,
            'joki' => $joki,
        ]);
    } catch (\Exception $e) {
        return redirect()->route('jokis.create')->with('error', 'Failed to create Snap Token: ' . $e->getMessage());
    }
}


    public function destroy(Joki $joki)
    {
        $joki->delete();
        return redirect()->route('jokis.index')->with('success', 'Joki successfully deleted!');
    }
}
