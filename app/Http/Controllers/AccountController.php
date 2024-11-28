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
        $accounts = Account::with('characters')->get();
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
        $request->validate([
            'uid' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'location' => 'required|string',
            'characters' => 'nullable|array',
        ]);

        $account = Account::create($request->only(['uid', 'name', 'email', 'location']));

        // Attach characters if any are selected
        if ($request->has('characters')) {
            $account->characters()->attach($request->input('characters'));
        }

        return redirect()->route('accounts.index')->with('success', 'Account created successfully!');
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
        $validated = $request->validate([
            'name' => 'required|string',
            'uid' => 'required|integer',
            'email' => 'email|string',
            'location' => 'required|string',
            'character_name' => 'nullable|exists:characters,name'
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
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
