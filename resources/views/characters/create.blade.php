@extends('layouts.app')

@section('title', 'Input New Pokemon')

@section('content')

<div class="mt-4 p-5 text-center">
    <h1 class="text-teal text-3xl font-bold">Add Character</h1>
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

            <div class="bg-white shadow-md rounded-lg p-6 mb-4">
                <h5 class="font-semibold text-lg mb-4">Insert Character Name</h5>
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name</label>
                    <input type="text" class="block w-full border border-gray-300 rounded-md p-2" id="name" placeholder="Input Character Name" name="name" required value="{{ old('name') }}">
                </div>
            </div>


            <div class="bg-white shadow-md rounded-lg p-6 mb-4">
                <h5 class="font-semibold text-lg mb-4">Choose Character Detail</h5>
                <div>
                    <label class="block text-gray-700">Rarity</label>
                    <div class="flex items-center mb-2">
                        <input class="form-radio" type="radio" name="rarity" id="rarity_four" value="4" {{ old('rarity') == '4' ? 'checked' : '' }}>
                        <label class="ml-2" for="rarity_four">4</label>
                    </div>
                    <div class="flex items-center mb-2">
                        <input class="form-radio" type="radio" name="rarity" id="rarity_five" value="5" {{ old('rarity') == '5' ? 'checked' : '' }}>
                        <label class="ml-2" for="rarity_five">5</label>
                    </div>
            </div>


                <label for="nation" class="block text-gray-700">Nation</label>
                <select class="block w-full border border-gray-300 rounded-md p-2" id="nation" name="nation" required>
                    <option value=""></option>
                    <option value="Monstadt">Monstadt</option>
                    <option value="Liyue">Liyue</option>
                    <option value="Inazuma">Inazuma</option>
                    <option value="Sumeru">Sumeru</option>
                    <option value="Fontaine">Fontaine</option>
                    <option value="Natlan">Natlan</option>
                    <option value="Snezhnaya">Snezhnaya</option>
                </select>


                <label for="element" class="block text-gray-700 mt-3">Element</label>
                <select class="block w-full border border-gray-300 rounded-md p-2" id="element" name="element" required>
                    <option value=""></option>
                    <option value="Anemo">Anemo</option>
                    <option value="Geo">Geo</option>
                    <option value="Electro">Electro</option>
                    <option value="Dendro">Dendro</option>
                    <option value="Pyro">Pyro</option>
                    <option value="Cryo">Cryo</option>
                </select>

                <label for="type" class="block text-gray-700 mt-3">Weapon</label>
                <select class="block w-full border border-gray-300 rounded-md p-2" id="type" name="type"  required value="{{ old(key: 'type')}}">
                    <option value=""></option>
                    <option value="Sword">Sword</option>
                    <option value="Claymore">Claymore</option>
                    <option value="Polearm">Polearm</option>
                    <option value="Catalyst">Catalyst</option>
                    <option value="Bow">Bow</option>
                </select>

                <div class="mb-4 mt-3">
                    <label for="avatar" class="block text-gray-700 ">Avatar</label>
                    <input type="file" class="block w-full border border-gray-300 rounded-md p-2 mt-1" id="avatar" name="avatar">
                </div>
            </div>


            <button type="submit" class="bg-teal text-white font-bold py-2 px-4 rounded mt-4 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
                Save
            </button>
        </form>
    </div>
</div>

@endsection

