<?php

namespace App\Http\Controllers;

use App\Models\Weapon;
use Illuminate\Http\Request;

class WeaponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $weapons = Weapon::paginate(9);
        return view('weapons.index', compact('weapons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view( 'weapons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'rarity' => 'required|integer|in:4,5',
            'weapon_type' => 'required|string|max:255',
            'base_atk' => 'required|integer|max:5',
            'secondary_stat' => 'required|integer|max:5',
            'secondary_stat_value'  => 'required|integer|max:5',
        ]);

        Weapon::create($validated);

        return redirect()->route('weapons.index')->with('Success', 'Weapon created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Weapon $weapon)
    {
        return view('weapons.show', compact('weapon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Weapon $category)
    {
        return view( 'weapons.edit', compact('weapon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Weapon $weapons)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'rarity' => 'required|integer|in:4,5',
            'weapon_type' => 'required|string|max:255',
            'base_atk' => 'required|integer|max:5',
            'secondary_stat' => 'required|integer|max:5',
            'secondary_stat_value'  => 'required|integer|max:5',
        ]);

        $weapons->update($validated);

        return redirect()->route('weapons.index')->with('Success', 'Weapon updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Weapon $weapons)
    {
        $weapons->delete();
        return redirect()->route('weapons.index')->with('success', 'Weapon delete succesfully');
    }
}
