@extends('layouts.app')

@section('title', "Character: $weapon->name")

@section('content')

<div class="p-5 text-center font-bold py-4 text-green">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Weapon Details</h1>

    @if ($weapon->avatar)
        <img src="{{ $weapon->avatar_url }}" class="rounded img-thumbnail mx-auto d-block my-3" alt="{{ $weapon->name }}" />
    @endif


  <table class="min-w-full bg-white border border-gray-200 rounded-lg mx-auto table mb-5">
    <tbody>
        <tr class="bg-gray-100 border-b">
            <th class="text-left p-4 font-semibold text-gray-700">Name</th>
            <td class="p-4 text-gray-700">{{ $weapon->name }}</td>
        </tr>
        <tr class="border-b">
            <th class="text-left p-4 font-semibold text-gray-700">Rarity</th>
            <td class="p-4 text-gray-700">{{ $weapon->rarity }}</td>
        </tr>
        <tr class="bg-gray-100 border-b">
            <th class="text-left p-4 font-semibold text-gray-700">Type</th>
            <td class="p-4 text-gray-700">{{ $weapon->type }}</td>
        </tr>
        <tr>
        <tr class="bg-gray-100 border-b">
            <th class="text-left p-4 font-semibold text-gray-700">Base Atk</th>
            <td class="p-4 text-gray-700">{{ $weapon->base_atk }}</td>
        </tr>
        <tr>
        <tr class="bg-gray-100 border-b">
            <th class="text-left p-4 font-semibold text-gray-700">Secondary Stat</th>
            <td class="p-4 text-gray-700">{{ $weapon->secondary_stat }}</td>
        </tr>
        <tr>
        <tr class="bg-gray-100 border-b">
        <tr class="bg-gray-100 border-b">
            <th class="text-left p-4 font-semibold text-gray-700">Secondary Stat Value</th>
            <td class="p-4 text-gray-700">{{ $weapon->secondary_stat_value }}</td>
        </tr>
    </tbody>
</table>


  <div class="container py-10 px-10 mx-0 min-w-full flex flex-col items-center">
  <a href="{{ route('weapons.edit', $weapon) }}" class="py-2 px-4 bg-green text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">Edit</a>
        <form action="{{ route('weapons.destroy', $weapon) }}" method="POST" style="display:inline;">
        <button class="mt-3 py-2 px-4 bg-green text-white font-semibold rounded-md hover:bg-white  focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
        <a href="{{ route('weapons.index') }}" class="px-6 py-2 bg-black text-white font-semibold shadow hover:bg-blue-600 transition rounded items-center">
            Back
        </a>
        </button>
    </div>
</div>

@endsection
