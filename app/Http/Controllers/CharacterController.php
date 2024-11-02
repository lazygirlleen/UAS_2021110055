<?php

namespace App\Http\Controllers;

use App\Models\Character;
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
        $characters = Character::paginate(10);
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
        ]);

        // if($request->hasFile('avatar')){
        //     $request->validate([
        //         'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,svg|max:2048',
        //     ]);
        //     $imagePath = $request->file('avatar')->storePublicly('public/images');
        //     $validated['avatar'] = $imagePath;
        // }

        Character::create([
            'name'=> $validated['name'],
            'rarity'=> $validated['rarity'],
            'nation'=> $validated['nation'],
            'element'=> $validated['element'],
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
        return view('characters.edit', compact('character'));
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
        ]);

        // if($request->hasFile('avatar')){
        //     $request->validate([
        //         'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,svg|max:2048',
        //     ]);
        //     $imagePath = $request->file('avatar')->storePublicly('public/images');
        //     $validated['avatar'] = $imagePath;
        // }

        Character::create([
            'name'=> $validated['name'],
            'rarity'=> $validated['rarity'],
            'nation'=> $validated['nation'],
            'element'=> $validated['element'],
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
