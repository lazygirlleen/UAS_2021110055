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
            0 =>
            array (
                'name' => 'Amber',
                'rarity' => 4,
                'nation' => 'Monstadt',
                'element' => 'Pyro',
                // 'weapon_id' => 'Bow',
                // 'photo' => 'public/amber.png'
            ),
            1 =>
            array (
                'name' => 'Barbara',
                'rarity' => 4,
                'nation' => 'Monstadt',
                'element' => 'Hydro',
                // 'weapon_id' => 'Catalyst',
                // 'photo' => 'public/barbara.png'
            ),
        )
    );
    }
}
