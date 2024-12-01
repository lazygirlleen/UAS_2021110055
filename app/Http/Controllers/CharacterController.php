<?php

namespace App\Http\Controllers;

use App\Models\Artefact;
use App\Models\Character;
use App\Models\Weapon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
       $this->middleware('auth')->except('index'); // seluruh fungsi hrs melewati auth kecuali index
    }

    public function index()
    {
        $characters = Character::paginate(9);
        return view('characters.index', compact('characters'));
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
        $artefacts = Artefact::all();
        $weapons = Weapon::all();
        return view('characters.edit', compact('character', 'weapons', 'artefacts'));
    }

    public function create()
    {
        $artefacts = Artefact::all();
        $weapons = Weapon::all();
        return view('characters.create', compact('weapons', 'artefacts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'rarity' => 'required|integer|in:4,5',
            'nation' => 'required|string|max:13',
            'element' => 'required|string|max:13',
            'weapon' => 'required|string|max:13',
            'faction' => 'nullablestring|max:255',
            'weapon_name' => 'nullable|exists:weapons,name',
            'artefact_name' => 'nullable|exists:artefacts,name'
        ]);


        $character = Character::create($validated);


        if ($request->hasFile('avatar')) {
            $request->validate([
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);

            $imagePath = $request->file('avatar')->store('public/images');
            $character->avatar = str_replace('public/', '', $imagePath);
            $character->save();
        }


        if ($request->has('weapons')) {
            $character->weapons()->sync($request->input('weapons'));
        }

        if ($request->has('artefacts')) {
            $character->artefacts()->sync($request->input('artefacts'));
        }

        return redirect()->route(route: 'characters.index')->with('success', 'Character created successfully');
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
            'faction' => 'nullable|string|max:255',
            'weapon_name' => 'nullable|exists:weapons,name',
            'artefact_name' => 'nullable|exists:artefacts,name'
        ]);

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            $request->validate([
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);

            // Store the uploaded file
            $imagePath = $request->file('avatar')->store('public/images');
            $validated['avatar'] = str_replace('public/', '', $imagePath); // Remove 'public/' for storage

            // Delete the old avatar if it exists
            if ($character->avatar) {
                Storage::delete('public/' . $character->avatar);
            }
        }

        // Update character attributes
        $character->update([
            'name' => $validated['name'],
            'rarity' => $validated['rarity'],
            'nation' => $validated['nation'],
            'element' => $validated['element'],
            'weapon' => $validated['weapon'],
            'faction' => $validated['faction'] ?? null,
            'weapon_name' => $validated['weapon_name'] ?? null,
            'artefact_name' => $validated['artefact_name'] ?? null,
            'avatar' => $validated['avatar'] ?? $character->avatar, // Use new or existing avatar
        ]);

        // Sync selected weapons
        if ($request->has('weapons')) {
            $character->weapons()->sync($request->input('weapons'));
        }

        if ($request->has('artefacts')) {
            $character->artefacts()->sync($request->input('artefacts'));
        }

        return redirect()->route('characters.index')->with('success', 'Character updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        // Delete avatar image
        if ($character->avatar) {
            Storage::delete('public/' . $character->avatar);
        }

        $character->delete();

        return redirect()->route('characters.index')->with('success', 'Character deleted successfully');
    }
}
