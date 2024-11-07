@extends('layouts.app')

@section('title', 'Edit Character')

@section('content')

<div class="mt-4 p-5 bg-black text-white rounded">
    <h1>Edit Character</h1>
</div>

<div class="row my-5">
    <div class="col-12 px-5">
        @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('characters.update', $weapon->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ old('name', $weapon->name) }}" required>
            </div>

            <div class="form-group mt-3">
                <label for="rarity">Rarity</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rarity" id="rarity_four" value="4" {{ old('rarity', $weapon->rarity) == 4 ? 'checked' : '' }}>
                    <label class="form-check-label" for="rarity_four">4</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rarity" id="rarity_five" value="5" {{ old('rarity', $weapon->rarity) == 5 ? 'checked' : '' }}>
                    <label class="form-check-label" for="rarity_five">5</label>
                </div>
            </div>


            <div class="form-group mt-3">
                <label for="nation">Nation</label>
                <select class="form-select" id="nation" name="nation"  required value="{{ old(key: 'nation')}}">
                <option disabled>Choose a type</option>
                    @foreach (['Monstadt', 'Liyue', 'Inazuma', 'Sumeru', 'Fontaine', 'Natlan', 'Snezhnaya'] as $type)
                        <option value="{{ $type }}" {{ old('nation', $weapon->nation) == $type ? 'selected' : '' }}>
                            {{ $type }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="element">Element</label>
                <select class="form-select" id="element" name="element"  required value="{{ old(key: 'element')}}">
                <option disabled>Choose a type</option>
                    @foreach (['Anemo', 'Geo', 'Electro', 'Dendro', 'Hydro', 'Pyro', 'Cryo'] as $type)
                        <option value="{{ $type }}" {{ old('element', $weapon->element) == $type ? 'selected' : '' }}>
                            {{ $type }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="form-group mt-3">
                <label for="weapon">Weapon</label>
                <select class="form-select" id="weapon" name="weapon"  required value="{{ old(key: 'weapon')}}">
                <option disabled>Choose a type</option>
                    @foreach (['Bow', 'Sword', 'Claymore', 'Catalyst', 'Polearm'] as $type)
                        <option value="{{ $type }}" {{ old('weapon', $weapon->weapon) == $type ? 'selected' : '' }}>
                            {{ $type }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-3">
                    <label for="avatar">Avatar</label>
                    <input type="file" class="form-control" id="avatar"  name="avatar">
                    @if ($weapon->avatar)
                        <img src={{ $weapon->avatar_url }} class="mt-3" style="max-width: 400px;"/>
                    @endif
            </div>


            <button type="submit" class="btn btn-primary btn-block mt-4">Save</button>
        </form>
    </div>
</div>

@endsection

