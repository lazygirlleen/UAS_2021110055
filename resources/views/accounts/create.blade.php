@extends('layouts.app')

@section('title', 'Input New Pokemon')

@section('content')

<div class="mt-4 p-5 bg-black text-white rounded">
    <h1>Add Account Information</h1>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
        Button
    </button>
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

        <form action="{{ route('characters.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="id">Account ID</label>
                <input type="number" class="form-control" id="id" placeholder="Id" name="id" required value="{{ old('id') }}">
            </div>

            <div class="form-group mt-3">
                <label for="server">Server</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="server" id="Asia" value="Asia" {{ old('server') == 'Asia' ? 'checked' : '' }}>
                    <label class="form-check-label" for="Asia">Asia</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="server" id="Europa" value="Europa" {{ old('server') == 'Europa' ? 'checked' : '' }}>
                    <label class="form-check-label" for="Europa">Europa</label>
                </div>
            </div>


            <div class="form-group mt-3">
                <label for="nation">Nation</label>
                <select class="form-select" id="nation" name="nation" required value="{{ old('nation')}}">
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
                <select class="form-select" id="element" name="element"  required value="{{ old(key: 'element')}}">
                    <option value=""></option>
                    <option value="Anemo">Anemo</option>
                    <option value="Geo">Geo</option>
                    <option value="Electro">Electro</option>
                    <option value="Dendro">Dendro</option>
                    <option value="Pyro">Pyro</option>
                    <option value="Cryo">Cryo</option>
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="weapon">Weapon</label>
                <select class="form-select" id="weapon" name="weapon"  required value="{{ old(key: 'weapon')}}">
                    <option value=""></option>
                    <option value="Sword">Sword</option>
                    <option value="Claymore">Claymore</option>
                    <option value="Polearm">Polearm</option>
                    <option value="Catalyst">Catalyst</option>
                    <option value="Bow">Bow</option>
                </select>
            </div>

            <div class="form-group mt-3">
                    <label for="avatar">Avatar</label>
                    <input type="file" class="form-control" id="avatar"  name="avatar">
            </div>


            <button type="submit" class="btn btn-primary btn-block mt-4">Save</button>
        </form>
    </div>
</div>

@endsection

