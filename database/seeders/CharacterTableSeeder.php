<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CharacterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('characters')->delete();

        DB::table('characters')->insert([
            [
                'name' => 'Amber',
                'rarity' => 4,
                'nation' => 'Monstadt',
                'element' => 'Pyro',
                'type' => 'Bow',
                'faction' => 'Knight of Favonius',
                'avatar' => 'Amber.png'
            ],
            [
                'name' => 'Barbara',
                'rarity' => 4,
                'nation' => 'Monstadt',
                'element' => 'Hydro',
                'type' => 'Catalyst',
                'faction' => 'Church of Favonius',
                'avatar' => 'Barbara.png'
            ],
            [
                'name' => 'Jean',
                'rarity' => 5,
                'nation' => 'Monstadt',
                'element' => 'Anemo',
                'type' => 'Sword',
                'faction' => 'Knight of Favonius',
                'avatar' => 'Jean.png'
            ],
            [
                'name' => 'Diluc',
                'rarity' => 5,
                'nation' => 'Monstadt',
                'element' => 'Pyro',
                'type' => 'Claymore',
                'faction' => 'Dawn Winery',
                'avatar' => 'Diluc.png'
            ],
            [
                'name' => 'Mona',
                'rarity' => 5,
                'nation' => 'Monstadt',
                'element' => 'Hydro',
                'type' => 'Catalyst',
                'faction' => 'Monstadt',
                'avatar' => 'Mona.png'
            ],
            [
                'name' => 'Kaeya',
                'rarity' => 4,
                'nation' => 'Monstadt',
                'element' => 'Cryo',
                'type' => 'Sword',
                'faction' => 'Knight of Favonius',
                'avatar' => 'Kaeya.png'
            ],
            [
                'name' => 'Venti',
                'rarity' => 5,
                'nation' => 'Monstadt',
                'element' => 'Anemo',
                'type' => 'Bow',
                'faction' => 'Monstadt',
                'avatar' => 'Venti.png'
            ],
            [
                'name' => 'Lisa',
                'rarity' => 4,
                'nation' => 'Monstadt',
                'element' => 'Electro',
                'type' => 'Catalyst',
                'faction' => 'Knight of Favonius',
                'avatar' => 'Lisa.jpg'
            ],
            [
                'name' => 'Klee',
                'rarity' => 5,
                'nation' => 'Monstadt',
                'element' => 'Pyro',
                'type' => 'Catalyst',
                'faction' => 'Knight of Favonius',
                'avatar' => 'Klee.jpg'
            ],
            [
                'name' => 'Razor',
                'rarity' => 4,
                'nation' => 'Monstadt',
                'element' => 'Electro',
                'type' => 'Claymore',
                'faction' => 'Wolvendom',
                'avatar' => 'Razor.png'
            ],
            [
                'name' => 'Bennet',
                'rarity' => 4,
                'nation' => 'Monstadt',
                'element' => 'Pyro',
                'type' => 'Sword',
                'faction' => 'Adventurers Guild',
                'avatar' => 'Bennet.png'
            ],
            [
                'name' => 'Noelle',
                'rarity' => 4,
                'nation' => 'Mondstadt',
                'element' => 'Geo',
                'type' => 'Claymore',
                'faction' => 'Knight of Favonius',
                'avatar' => 'Noelle.png'
            ],
            [
                'name' => 'Fischl',
                'rarity' => 4,
                'nation' => 'Mondstadt',
                'element' => 'Electro',
                'type' => 'Bow',
                'faction' => 'Adventurers Guild',
                'avatar' => 'Fischl.png'
            ],
            [
                'name' => 'Sucrose',
                'rarity' => 4,
                'nation' => 'Mondstadt',
                'element' => 'Anemo',
                'type' => 'Catalyst',
                'faction' => 'Knight of Favonius',
                'avatar' => 'Sucrose.png'
            ],
            [
                'name' => 'Diona',
                'rarity' => 4,
                'nation' => 'Mondstadt',
                'element' => 'Cryo',
                'type' => 'Bow',
                'faction' => 'The Cats Tail',
                'avatar' => 'Diona.png'
            ],
            [
                'name' => 'Albedo',
                'rarity' => 5,
                'nation' => 'Mondstadt',
                'element' => 'Geo',
                'type' => 'Sword',
                'faction' => 'Knight of Favonius',
                'avatar' => 'Albedo.png'
            ],
            [
                'name' => 'Rosaria',
                'rarity' => 4,
                'nation' => 'Mondstadt',
                'element' => 'Cryo',
                'type' => 'Polearm',
                'faction' => 'Church of Favonious',
                'avatar' => 'Rosaria.png'
            ],
            [
                'name' => 'Eula',
                'rarity' => 5,
                'nation' => 'Mondstadt',
                'element' => 'Cryo',
                'type' => 'Claymore',
                'faction' => 'Knight of Favonius',
                'avatar' => 'Eula.png'
            ],
            [
                'name' => 'Mika',
                'rarity' => 4,
                'nation' => 'Mondstadt',
                'element' => 'Cryo',
                'type' => 'Polearm',
                'faction' => 'Knight of Favonius',
                'avatar' => 'Mika.png'
            ],
            [
                'name' => 'Aloy',
                'rarity' => 5,
                'nation' => 'Mondstadt',
                'element' => 'Cryo',
                'type' => 'Bow',
                'faction' => 'Wandering Heroine',
                'avatar' => 'Aloy.png'
            ]
        ]);
    }
}
