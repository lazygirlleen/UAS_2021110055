@extends('layouts.app')

@section('title', 'Input New Pokemon')

@section('content')

<div class="mt-4 p-5 bg-black text-white rounded">
    <h1>Add New Character</h1>
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

        <form action="{{ route('character.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Name" name="name" required value="{{ old('name') }}">
            </div>

            <div class="form-group mt-3">
                <label for="rarity">Rarity</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rarity" id="rarity_four" value="4" {{ old('rarity') == '4' ? 'checked' : '' }}>
                    <label class="form-check-label" for="rarity_four">4</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rarity" id="rarity_five" value="5" {{ old('rarity') == '5' ? 'checked' : '' }}>
                    <label class="form-check-label" for="rarity_five">5</label>
                </div>
            </div>


            <div class="form-group mt-3">
                <label for="nation">Nation</label>
                <select class="form-select" id="nation" name="nation" required>
                    <option value=""></option>
                    <option value="Monstadt">Monstadt</option>
                    <option value="Liyue">Liyue</option>
                    <option value="Inazuma">Inazuma</option>
                    <option value="Sumeru">Sumeru</option>
                    <option value="Fontaine">Fontaine</option>
                    <option value="Natlan">Natlan</option>
                    <option value="Snezhnaya">Snezhnaya</option>
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="element">Element</label>
                <select class="form-select" id="element" name="element" required>
                    <option value=""></option>
                    <option value="Anemo">Anemo</option>
                    <option value="Geo">Geo</option>
                    <option value="Electro">Electro</option>
                    <option value="Dendro">Dendro</option>
                    <option value="Pyro">Pyro</option>
                    <option value="Cryo">Cryo</option>
                </select>
            </div>



            <button type="submit" class="btn btn-primary btn-block mt-4">Save</button>
        </form>
    </div>
</div>

@endsection

