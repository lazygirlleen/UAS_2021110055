@extends('layouts.app')

@section('title', "Character: $character->name")

@section('content')
<div class="max-w-2xl mx-auto mt-8 p-6 bg-white">
  <h1 class="text-3xl font-bold text-gray-800 mb-6">Character Details</h1>

  <table class="min-w-full bg-white border border-gray-200 rounded-lg mx-auto table mb-5">
    <tbody>
        <tr class="bg-gray-100 border-b">
            <th class="text-left p-4 font-semibold text-gray-700">Name</th>
            <td class="p-4 text-gray-700">{{ $character->name }}</td>
        </tr>
        <tr class="border-b">
            <th class="text-left p-4 font-semibold text-gray-700">Rarity</th>
            <td class="p-4 text-gray-700">{{ $character->rarity }}</td>
        </tr>
        <tr class="bg-gray-100 border-b">
            <th class="text-left p-4 font-semibold text-gray-700">Nation</th>
            <td class="p-4 text-gray-700">{{ $character->nation }}</td>
        </tr>
        <tr>
            <th class="text-left p-4 font-semibold text-gray-700">Element</th>
            <td class="p-4 text-gray-700">{{ $character->element }}</td>
        </tr>
    </tbody>
</table>


  <div class="container py-10 px-10 mx-0 min-w-full flex flex-col items-center">
        <button class=" bg-black  text-white  py-2 px-4 mt-3 rounded">
        <a href="{{ route('characters.index') }}" class="px-6 py-2 bg-black text-white font-semibold shadow hover:bg-blue-600 transition rounded items-center">
            Back
        </a>
        </button>
    </div>
</div>

@endsection
