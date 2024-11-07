<?php

namespace App\Http\Controllers;

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
       $this->middleware('auth')->except('index'); //seluruh fungsi hrs melewati auth kecuali index
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
            'weapon_name' => 'nullable|exists:weapons,name'
        ]);

        if($request->hasFile('avatar')){
            $request->validate([
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,svg|max:2048',
            ]);
            $imagePath = $request->file('avatar')->storePublicly('public/images');

            if($character->avatar){
                Storage::delete($character->avatar);
            }
            $validated['avatar'] = $imagePath;
        }

        $character = Character::create([
            'name'=> $validated['name'],
            'rarity'=> $validated['rarity'],
            'nation'=> $validated['nation'],
            'element'=> $validated['element'],
            'weapon'=> $validated['weapon'],
            'faction'=> $validated['faction'],
            'weapon_name'=> $validated['weapon_name'] ?? null,
        ]);

        if($request->has('weapons')) {
            $character->weapons()->sync($request->input('weapons'));
        }

        return redirect()->route('characters.index')->with('success', 'Character update succesfully');
    }


    /**
     * Remove the specified resource from storage.
     */

}
