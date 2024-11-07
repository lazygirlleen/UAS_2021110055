@extends('layouts.app')

@section('content')
<div class="mt-4 p-5 bg-black text-white">
    <h1>Welcome to Genshin Impact Website!</h1>
</div>
<div class="container">
  <div class="row g-4 mt-4">
    <div class="bg-white dark:bg-gray-900 mt-3 py-8 px-4 mx-auto max-w-screen-xl lg:px-6">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
      <h2 class="mt-3 font-bold mb-3">Our Features</h2>

        <div class="col mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h3 class="mb-2 text-xl font-bold dark:text-white">Characters Wikipedia</h3>
              <p class="text-gray-500 dark:text-gray-400">See all of the Genshin Impact Character information in our Website.</p>
            </div>
          </div>
        </div>


        <div class="col mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h3 class="mb-2 text-xl font-bold dark:text-white">Weapon Wikipedia</h3>
              <p class="text-gray-500 dark:text-gray-400">See all of the Genshin Impact Weapon information in our Website.</p>
            </div>
          </div>
        </div>


        <div class="col mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h3 class="mb-2 text-xl font-bold dark:text-white">Top Up</h3>
              <p class="text-gray-500 dark:text-gray-400">You can top up Blessing of the Welkin Moon and Genesis Crystal in here.</p>
            </div>
          </div>
        </div>


        <div class="col mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h3 class="mb-2 text-xl font-bold dark:text-white">Joki</h3>
              <p class="text-gray-500 dark:text-gray-400">Got any problem on your game? We can help you.</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection
