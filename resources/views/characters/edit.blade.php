@extends('layouts.app')

@section('title', 'Edit Character')

@section('content')

<div class="mt-4 p-5 text-center">
    <h1 class="text-teal text-3xl font-bold">Edit Character</h1>
</div>


        @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('characters.update', $character->id) }}" method="POST">
            @csrf
            @method('PUT')


            <div class="bg-white shadow-md rounded-lg p-6 mb-4">
                <h5 class="font-semibold text-lg mb-4">Insert Character Name</h5>
                <label for="name">Name</label>
                <input type="text" class="block w-full border border-gray-300 rounded-md p-2" id="name" placeholder="Name" name="name" value="{{ old('name', $character->name) }}" required>
            </div>


            <div class="bg-white shadow-md rounded-lg p-6 mb-4">
                <h5 class="font-semibold text-lg mb-4">Choose Character Detail</h5>
                <label for="rarity">Rarity</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rarity" id="rarity_four" value="4" {{ old('rarity', $character->rarity) == 4 ? 'checked' : '' }}>
                    <label class="form-check-label" for="rarity_four">4</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rarity" id="rarity_five" value="5" {{ old('rarity', $character->rarity) == 5 ? 'checked' : '' }}>
                    <label class="form-check-label" for="rarity_five">5</label>
                </div>



            <div class="form-group mt-3">
                <label for="nation">Nation</label>
                <select class="block w-full border border-gray-300 rounded-md p-2" id="nation" name="nation"  required value="{{ old(key: 'nation')}}">
                <option disabled>Choose a type</option>
                    @foreach (['Monstadt', 'Liyue', 'Inazuma', 'Sumeru', 'Fontaine', 'Natlan', 'Snezhnaya'] as $type)
                        <option value="{{ $type }}" {{ old('nation', $character->nation) == $type ? 'selected' : '' }}>
                            {{ $type }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="element">Element</label>
                <select class="block w-full border border-gray-300 rounded-md p-2" id="element" name="element"  required value="{{ old(key: 'element')}}">
                <option disabled>Choose a type</option>
                    @foreach (['Anemo', 'Geo', 'Electro', 'Dendro', 'Hydro', 'Pyro', 'Cryo'] as $type)
                        <option value="{{ $type }}" {{ old('element', $character->element) == $type ? 'selected' : '' }}>
                            {{ $type }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="form-group mt-3">
                <label for="weapon">Weapon</label>
                <select class="block w-full border border-gray-300 rounded-md p-2" id="weapon" name="weapon"  required value="{{ old(key: 'weapon')}}">
                <option disabled>Choose a Weapon</option>
                    @foreach (['Bow', 'Sword', 'Claymore', 'Catalyst', 'Polearm'] as $weapon)
                        <option value="{{ $weapon }}" {{ old('weapon', $character->weapon) == $weapon ? 'selected' : '' }}>
                            {{ $weapon }}
                        </option>
                    @endforeach
                </select>
            </div>

        <div class="form-group mt-3">
            <label for="weapon_name">Characters Weapons</label>
            <select class="block w-full border border-gray-300 rounded-md p-2" name="weapons[]" multiple>
                @foreach ($weapons as $weapon)
                    <option value="{{ $weapon->name }}" {{ $character->weapons->contains('name', $weapon->name) ? "selected" : "" }}>
                        {{ $weapon->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="artefact_name">Characters Artefacts</label>
            <select class="block w-full border border-gray-300 rounded-md p-2" name="artefacts[]" multiple>
                @foreach ($artefacts as $artefact)
                    <option value="{{ $artefact->name }}" {{ $character->artefacts->contains('name', $artefact->name) ? "selected" : "" }}>
                        {{ $artefact->name }}
                    </option>
                @endforeach
            </select>
        </div>

            <div class="form-group mt-3">
                    <label for="avatar">Avatar</label>
                    <input type="file" class="form-control" id="avatar"  name="avatar">
                    @if ($character->avatar)
                        <img src={{ $character->avatar_url }} class="mt-3" style="max-width: 400px;"/>
                    @endif
            </div>
            </div>


            <button type="submit" class="bg-teal text-pink font-bold py-2 px-4 rounded mt-4 hover:bg-pink hover:text-teal focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">Save</button>
        </form>
    </div>
</div>

@endsection

