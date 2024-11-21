<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Joki;
use Illuminate\Http\Request;

class JokiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jokis = Joki::paginate(10);
        return view('jokis.index', compact('jokis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $accounts = Account::all();
        return view('jokis.create', compact('accounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           // Validasi data
        $validated = $request->validate([
            'id' => 'required|string|max:255',
            'joki_type' => 'required|string',
            'payment_method' => 'required|string',
            'account_id' => 'nullable|exists:accounts,id',
        ]);

        // Simpan data ke database
        Joki::create([
            'id' => $request->id,
            'joki_type' => $request->joki_type,
            'payment_method' => $request->payment_method,
            'account_id' => $validated['account_id'] ?? null,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('jokis.index')->with('success', 'Joki successfully added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Joki $joki)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Joki $joki)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Joki $joki)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Joki $joki)
    {
        //
    }
}
