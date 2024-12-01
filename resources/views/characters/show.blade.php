@extends('layouts.app')

@section('title', "Character: $character->name")

@section('content')

<div class="p-3 text-center font-bold py-4 text-teal">
    <div class="text-teal text-3xl">
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
        <tr class="bg-gray-100 border-b">
            <th class="text-left p-4 font-semibold text-gray-700">Element</th>
            <td class="p-4 text-gray-700">{{ $character->element }}</td>
        </tr>
        <tr class="bg-gray-100 border-b">
            <th class="text-left p-4 font-semibold text-gray-700">Faction</th>
            <td class="p-4 text-gray-700">{{ $character->faction }}</td>
        </tr>
        <tr class="bg-gray-100 border-b">
            <th class="text-left p-4 font-semibold text-gray-700">Weapons</th>
            <td class="p-4 text-gray-700">
                @if ($character->weapons->isNotEmpty())
                    <ul>
                        @foreach ($character->weapons as $weapon)
                            <li>{{ $weapon->name }}</li>
                        @endforeach
                    </ul>
                @else
                    <span>No weapons assigned</span>
                @endif
            </td>
        </tr>
        <tr class="bg-gray-100 border-b">
            <th class="text-left p-4 font-semibold text-gray-700">Artefacts</th>
            <td class="p-4 text-gray-700">
                @if ($character->artefacts->isNotEmpty())
                    <ul>
                        @foreach ($character->artefacts as $artefact)
                            <li>{{ $artefact->name }}</li>
                        @endforeach
                    </ul>
                @else
                    <span>No artefacts assigned</span>
                @endif
            </td>
        </tr>
    </tbody>
</table>

<div class="container py-10 flex justify-center">
    <div class="flex space-x-4">
        <!-- Edit Button -->
        <a href="{{ route('characters.edit', $character) }}"
           class="bg-blue text-white font-medium py-2 px-6 rounded hover:bg-blue-600 transition">
           Edit
        </a>

       <!-- Trigger Button -->
<button type="button"
        class="bg-blue text-white font-medium py-2 px-6 rounded hover:bg-red-600 transition"
        onclick="openModal('deleteModal')">
    Delete
</button>

<!-- Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg max-w-sm w-full p-6">
        <!-- Modal Header -->
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Confirm Delete</h3>
        <!-- Modal Body -->
        <p class="text-gray-600 mb-6">
            Are you sure you want to delete this character? This action cannot be undone.
        </p>
        <!-- Modal Footer -->
        <div class="flex justify-end space-x-4">
            <!-- Cancel Button -->
            <button type="button"
                    class="bg-teal text-white font-medium py-2 px-4 rounded hover:bg-gray-600 transition"
                    onclick="closeModal('deleteModal')">
                Cancel
            </button>
            <!-- Confirm Delete Button -->
            <form action="{{ route('characters.destroy', $character) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-blue text-white font-medium py-2 px-4 rounded hover:bg-red-600 transition">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>


        <!-- Back Button -->
        <a href="{{ route('characters.index') }}"
           class="bg-teal text-white font-medium py-2 px-6 rounded hover:bg-gray-600 transition">
           Back
        </a>
    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }

    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }
</script>



@endsection
