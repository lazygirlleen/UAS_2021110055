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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'account_id' => 'required|array', // Ensure account_id is an array
            'account_id.*' => 'exists:accounts,id', // Each selected ID must exist in the accounts table
            'joki_type' => 'required|string',
            'payment_method' => 'required|string',
            'price' => 'required|integer',  // Validate price
        ]);

        // Get the price based on the joki_type
        $price = (new Joki(['joki_type' => $validated['joki_type']]))->getPrice();

        // Create the Joki record with the calculated price
        $joki = Joki::create([
            'account_id' => $validated['account_id'][0], // Take the first ID from the array
            'joki_type' => $validated['joki_type'],
            'payment_method' => $validated['payment_method'],
            'price' => $price, // Save the price
        ]);

        return redirect()->route('jokis.payment', $joki->id);
    }

    public function payment(Joki $joki)
    {
        // Ensure Midtrans is configured
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        // Create Snap Token based on Joki ID
        $params = [
            'transaction_details' => [
                'order_id' => $joki->id,
                'gross_amount' => $joki->price, // Use the price directly from the Joki model
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
