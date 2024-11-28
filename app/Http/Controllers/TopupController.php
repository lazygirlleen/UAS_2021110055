<?php

namespace App\Http\Controllers;

use App\Models\Account;
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
        // Retrieve all accounts to pass to the view
        $accounts = Account::all();
        return view('topups.create', compact('accounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'topup_type' => 'required|string',
            'package' => 'required|string',
            'payment_method' => 'required|string',
            'account_id' => 'nullable|exists:accounts,id',
        ]);

        // Store the data in the database
        Topup::create([
            'topup_type' => $request->topup_type,
            'package' => $request->package,
            'payment_method' => $request->payment_method,
            'account_id' => $validated['account_id'] ?? null,
        ]);

        // Redirect with success message
        return redirect()->route('topups.index')->with('success', 'Top Up successfully added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Topup $topup)
    {
        // Implementation can be added here if needed
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topup $topup)
    {
        // Implementation can be added here if needed
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topup $topup)
    {
        // Implementation can be added here if needed
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topup $topup)
    {
        // Implementation can be added here if needed
    }
}
