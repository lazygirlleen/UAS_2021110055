<?php

namespace App\Http\Controllers;

use App\Models\Artefact;
use Illuminate\Http\Request;

class ArtefactController extends Controller
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
        $artefacts = Artefact::paginate(9);
        return view('artefacts.index', compact('artefacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Artefact $artefact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artefact $artefact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artefact $artefact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artefact $artefact)
    {
        //
    }
}
