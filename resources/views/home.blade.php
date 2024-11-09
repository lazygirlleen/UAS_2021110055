@extends('layouts.app')

@section('content')
<div class="mt-4 p-5 text-center font-bold py-4 uppercase ">
<h1 class="font-bold text-green text-3xl">Welcome to Genshin Impact Website!</h1>
</div>

<div class="container mx-auto mb-4">
    <h2 class="text-2xl font-bold mb-6 text-center">Our Features</h2>
    <div id="stats" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="col mb-4">
        <div class="card h-100">
        <div class="card-body">
            <div class="bg-gray-500 rounded-lg transition-transform transform  duration-300 mb-3">
                <div class="p-6">
                <h3 class="mb-4 text-xl font-bold text-green">Characters Wikipedia</h3>
                    <p class="text-gray-300">See all of the Genshin Impact Character information in our Website.</p>
                </div>
            </div>
            </div>
            </div>
        </div>

        <div class="col mb-4">
          <div class="card h-100">
            <div class="card-body">
        <div class="bg-gray-500 rounded-lg transition-transform transform  duration-300 mb-3">
                <div class="p-6">
                    <h3 class="mb-2 text-xl font-bold text-green">Weapon Wikipedia</h3>
                    <p class="text-gray-300">See all of the Genshin Impact Weapon information in our Website.</p>
                </div>
            </div>
        </div>
        </div>
        </div>

        <div class="col mb-4">
        <div class="card h-100">
        <div class="card-body">
        <div class="bg-gray-500 rounded-lg transition-transform transform  duration-300 mb-3">
                <div class="p-6">
                    <h3 class="mb-2 text-xl font-bold text-green">Top Up</h3>
                    <p class="text-gray-300">You can top up Blessing of the Welkin Moon and Genesis Crystal in here.</p>
                </div>
            </div>
            </div>
            </div>
        </div>

        <div class="col mb-4">
        <div class="card h-100 ">
        <div class="card-body">
        <div class="bg-gray-500 rounded-lg transition-transform transform  duration-300 mb-3">
                <div class="p-6">
                    <h3 class="mb-2 text-xl font-bold text-green">Joki</h3>
                    <p class="text-gray-300">Got any problem on your game? We can help you.</p>
                </div>
            </div>
        </div>
        </div>

        </div>
    </div>
</div>
@endsection
