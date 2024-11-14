<?php

namespace App\Http\Controllers;

use App\Models\Topup;
use Illuminate\Http\Request;

class TopupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topups = Topup::paginate(10);
         return view('topups.index', compact('topups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('topups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'topup_type' => 'required|string',
            'package' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        // Simpan data ke database
        Topup::create([
            'topup_type' => $request->topup_type,
            'package' => $request->package,
            'payment_method' => $request->payment_method,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('topups.index')->with('success', 'Top Up successfully added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Topup $topup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topup $topup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topup $topup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topup $topup)
    {
        //
    }
}
