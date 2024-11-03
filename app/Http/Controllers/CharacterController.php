<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Weapon;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
       $this->middleware('auth')->except('index'); //seluruh fungsi hrs melewati auth kecuali index
   }

    public function index()
    {
        $weapons = Weapon::all();
        $characters = Character::paginate(5);
        return view('characters.index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('characters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'rarity' => 'required|integer|in:4,5',
            'nation' => 'required|string|max:13',
            'element' => 'required|string|max:13',
            'type' => 'required|string|max:13',
            'faction' => 'required|string|max:255',
        ]);

        if ($request->hasFile('avatar')) {
            $imagePath = $request->file('avatar')->store('images', 'public');
            $validated['avatar'] = $imagePath;
        }
        $character = Character::create($validated);

        $defaultWeaponId = 1;
        $character->weapons()->attach($defaultWeaponId);

        Character::create([
            'name'=> $validated['name'],
            'rarity'=> $validated['rarity'],
            'nation'=> $validated['nation'],
            'element'=> $validated['element'],
            'weapon'=> $validated['weapon'],
            'faction'=> $validated['faction'],
        ]);

        return redirect()->route('characters.index')->with('success', 'Character added succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        return view('characters.show', compact('character'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        $weapons = Weapon::all();
        return view('characters.edit', compact('character', 'weapons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Character $character)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'rarity' => 'required|integer|in:4,5',
            'nation' => 'required|string|max:13',
            'element' => 'required|string|max:13',
            'weapon' => 'required|string|max:13',
            'faction' => 'required|string|max:255',
        ]);

        if ($request->hasFile('avatar')) {
            $imagePath = $request->file('avatar')->store('images', 'public');
            $validated['avatar'] = $imagePath;
        }

        Character::create([
            'name'=> $validated['name'],
            'rarity'=> $validated['rarity'],
            'nation'=> $validated['nation'],
            'element'=> $validated['element'],
            'weapon'=> $validated['weapon'],
            'faction'=> $validated['faction'],
        ]);

        return redirect()->route('characters.index')->with('success', 'Character update succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        $character->delete();
        return redirect()->route('characters.index')->with('success', 'Character delete succesfully');
    }
}
