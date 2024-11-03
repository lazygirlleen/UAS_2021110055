<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CharacterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('characters')->delete();

        DB::table('characters')->insert(array (
            [
                'name' => 'Amber',
                'rarity' => 4,
                'nation' => 'Monstadt',
                'element' => 'Pyro',
                'type' => 'Bow',
                'faction' => 'Knight of Favonius',
                'avatar' => 'public/Amber.png'
            ],
            [
                'name' => 'Barbara',
                'rarity' => 4,
                'nation' => 'Monstadt',
                'element' => 'Hydro',
                'type' => 'Catalyst',
                'faction' => 'Church of Favonius',
                'avatar' => 'public/Barbara.png'
            ],
            [
                'name' => 'Jean',
                'rarity' => 5,
                'nation' => 'Monstadt',
                'element' => 'Anemo',
                'type' => 'Sword',
                'faction' => 'Knight of Favonius',
                'avatar' => 'public/Jean.png'
            ],
            [
                'name' => 'Diluc',
                'rarity' => 5,
                'nation' => 'Monstadt',
                'element' => 'Pyro',
                'type' => 'Claymore',
                'faction' => 'Dawn Winery',
                'avatar' => 'public/Diluc.png'
            ],
            [
                'name' => 'Mona',
                'rarity' => 5,
                'nation' => 'Monstadt',
                'element' => 'Hydro',
                'type' => 'Catalyst',
                'faction' => 'Monstadt',
                'avatar' => 'public/Mona.png'
            ],
            [
                'name' => 'Kaeya',
                'rarity' => 4,
                'nation' => 'Monstadt',
                'element' => 'Cryo',
                'type' => 'Sword',
                'faction' => 'Knight of Favonius',
                'avatar' => 'public/Kaeya.png'
            ],
            [
                'name' => 'Venti',
                'rarity' => 5,
                'nation' => 'Monstadt',
                'element' => 'Anemo',
                'type' => 'Bow',
                'faction' => 'Monstadt',
                'avatar' => 'public/Venti.png'
            ],
            [
                'name' => 'Lisa',
                'rarity' => 4,
                'nation' => 'Monstadt',
                'element' => 'Electro',
                'type' => 'Catalyst',
                'faction' => 'Knight of Favonius',
                'avatar' => 'public/Lisa.png'
            ],
            [
                'name' => 'Klee',
                'rarity' => 5,
                'nation' => 'Monstadt',
                'element' => 'Pyro',
                'type' => 'Catalyst',
                'faction' => 'Knight of Favonius',
                'avatar' => 'public/Klee.png'
            ],
            [
                'name' => 'Razor',
                'rarity' => 4,
                'nation' => 'Monstadt',
                'element' => 'Electro',
                'type' => 'Claymore',
                'faction' => 'Wolvendom',
                'avatar' => 'public/Razor.png'
            ],
            [
                'name' => 'Bennet',
                'rarity' => 4,
                'nation' => 'Monstadt',
                'element' => 'Pyro',
                'type' => 'Sword',
                'faction' => 'Adventurers Guild',
                'avatar' => 'public/Bennet.png'
            ],
            [
                'name' => 'Noelle',
                'rarity' => 4,
                'nation' => 'Mondstadt',
                'element' => 'Geo',
                'type' => 'Claymore',
                'faction' => 'Knight of Favonius',
                'avatar' => 'public/Noelle.png'
            ],
            [
                'name' => 'Fischl',
                'rarity' => 4,
                'nation' => 'Mondstadt',
                'element' => 'Electro',
                'type' => 'Bow',
                'faction' => 'Adventurers Guild',
                'avatar' => 'public/Fischl.png'
            ],
            [
                'name' => 'Sucrose',
                'rarity' => 4,
                'nation' => 'Mondstadt',
                'element' => 'Anemo',
                'type' => 'Catalyst',
                'faction' => 'Knight of Favonius',
                'avatar' => 'public/Sucrose.png'
            ],
            [
                'name' => 'Diona',
                'rarity' => 4,
                'nation' => 'Mondstadt',
                'element' => 'Cryo',
                'type' => 'Bow',
                'faction' => 'The Cats Tail',
                'avatar' => 'public/Diona.png'
            ],
            [
                'name' => 'Albedo',
                'rarity' => 5,
                'nation' => 'Mondstadt',
                'element' => 'Geo',
                'type' => 'Sword',
                'faction' => 'Knight of Favonius',
                'avatar' => 'public/Albedo.png'
            ],
            [
                'name' => 'Rosaria',
                'rarity' => 4,
                'nation' => 'Mondstadt',
                'element' => 'Cryo',
                'type' => 'Polearm',
                'faction' => 'Church of Favonious',
                'avatar' => 'public/Rosaria.png'
            ],
            [
                'name' => 'Eula',
                'rarity' => 5,
                'nation' => 'Mondstadt',
                'element' => 'Cryo',
                'type' => 'Claymore',
                'faction' => 'Knight of Favonius',
                'avatar' => 'public/Eula.png'
            ],
            [
                'name' => 'Mika',
                'rarity' => 4,
                'nation' => 'Mondstadt',
                'element' => 'Cryo',
                'type' => 'Polearm',
                'faction' => 'Knight of Favonius',
                'avatar' => 'public/Mika.png'
            ],
            [
                'name' => 'Aloy',
                'rarity' => 5,
                'nation' => 'Mondstadt',
                'element' => 'Cryo',
                'type' => 'Bow',
                'faction' => 'Wandering Heroine',
                'avatar' => 'public/Aloy.png'
            ]



        )
    );
    }
}
