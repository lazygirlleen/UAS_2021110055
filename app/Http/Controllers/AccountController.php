<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Character;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth')->except('index'); // seluruh fungsi hrs melewati auth kecuali index
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $characters = Character::all();
        $accounts = Account::all();
        return view('accounts.index', compact('characters', 'accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $characters = Character::all();
        return view('accounts.create', compact('characters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'email|string',
            'location' => 'required|string',
            'character_name' => 'nullable|exists:characters,name'
        ]);

        Account::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('accounts.index')->with('success', 'Account successfully added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        $account->delete();

        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully');
    }
}
