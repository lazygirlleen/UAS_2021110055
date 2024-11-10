@extends('layouts.app')

@section('title', "Character: $character->name")

@section('content')

<div class="p-3 text-center font-bold py-4 text-green">
<div class="text-green text-3xl">
    <h1 class="text-3xl font-bold text-gray-800 mb-3">Character Details</h1>
</div>
</div>
@if ($character->avatar)
        <img src="{{ asset('storage/' . $character->avatar) }}" class="rounded img-thumbnail mx-auto d-block my-3" alt="{{ $character->name }}" />
    @endif



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
        <tr class="bg-gray-100 border-b">
            <th class="text-left p-4 font-semibold text-gray-700">Element</th>
            <td class="p-4 text-gray-700">{{ $character->element }}</td>
        </tr>
        <tr>
        <tr class="bg-gray-100 border-b">
            <th class="text-left p-4 font-semibold text-gray-700">Weapon</th>
            <td class="p-4 text-gray-700">{{ $character->type }}</td>
        </tr>
        <tr>
        <tr class="bg-gray-100 border-b">
            <th class="text-left p-4 font-semibold text-gray-700">Faction</th>
            <td class="p-4 text-gray-700">{{ $character->faction }}</td>
        </tr>
    </tbody>
</table>


  <div class="container py-10 px-10 mx-0 min-w-full flex flex-col items-center">
  <a href="{{ route('characters.edit', $character) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('characters.destroy', $character) }}" method="POST" style="display:inline;">
            @csrf
                @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Character ini?');">Delete</button>
        </form>
        <button class=" bg-black  text-white  py-2 px-4 mt-3 rounded">
        <a href="{{ route('characters.index') }}" class="px-6 py-2 bg-black text-white font-semibold shadow hover:bg-blue-600 transition rounded items-center">
            Back
        </a>
        </button>
    </div>
</div>

@endsection
