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
        // Validasi data
        $validated = $request->validate([
            'id' => 'required|string|max:255',
            'joki_type' => 'required|string',
            'payment_method' => 'required|string',
            'account_id' => 'nullable|exists:accounts,id',
        ]);

        // Simpan data Joki
        $joki = Joki::create([
            'id' => $validated['id'],
            'joki_type' => $validated['joki_type'],
            'payment_method' => $validated['payment_method'],
            'account_id' => $validated['account_id'] ?? null,
        ]);

        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$isProduction = false; // Ganti ke true untuk produksi
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        // Data untuk transaksi
        $params = [
            'transaction_details' => [
                'order_id' => $joki->id,
                'gross_amount' => 100000, // Contoh jumlah transaksi (sesuaikan dengan kebutuhan)
            ],
            'customer_details' => [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'johndoe@example.com',
                'phone' => '081234567890',
            ],
        ];

        // Buat Snap Token
        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);

            // Redirect ke halaman pembayaran atau tampilkan token
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
