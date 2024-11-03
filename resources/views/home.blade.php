@extends('layouts.app')

@section('content')
<div class="mt-4 p-5 bg-black text-white">
    <h1>Welcome to Genshin Impact Website!</h1>
</div>

    <div class="bg-white shadow-md rounded p-4 mb-6">
        <div class="container mt-3">
        <h3 class=" font-semibold mb-4">Current Banner</h3>
        <table class="table mb-5">
            <thead>
                <tr>
                    <th class="py-2 text-left text-gray-600"></th>
                    <th class="py-2 text-left text-gray-600">Date</th>
                    <th class="py-2 text-left text-gray-600">Banners</th>
                    <th class="py-2 text-left text-gray-600">Details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td  class="py-2 text-left text-gray-600">Character Banner</td>
                    <td class="py-2 text-gray-700">October 29, 2024 - November 19, 2024</td>
                    <td class="py-2 text-gray-700">Hu Tao, Nahida</td>
                    <td class="py-2 text-gray-700">Click Here</td>
                </tr>
                <tr>
                    <td  class="py-2 text-left text-gray-600">Weapon Banner</td>
                    <td class="py-2 text-gray-700">October 29, 2024 - November 19, 2024</td>
                    <td class="py-2 text-gray-700">Staff of Homa, A Thousand Floating Dreams</td>
                    <td class="py-2 text-gray-700">Click Here</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
