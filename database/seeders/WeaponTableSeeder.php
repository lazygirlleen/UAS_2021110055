<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeaponTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('weapons')->delete();

        DB::table('weapons')->insert(array (
                [
                    'name' => 'Skyward Harp',
                    'rarity' => 5,
                    'type' =>'Bow'
                ],
                [
                    'name' => 'Aquila Favonia',
                    'rarity' => 5,
                    'type' => 'Sword'
                ],
                [
                    'name' => 'Primordial Jade Winged-Spear',
                    'rarity' => 5,
                    'type' => 'Polearm'
                ],
                [
                    'name' => 'Lost Prayer to the Sacred Winds',
                    'rarity' => 5,
                    'type' => 'Catalyst'
                ],
                [
                    'name' => 'Wolf\'s Gravestone',
                    'rarity' => 5,
                    'type' => 'Claymore'
                ],
        )
    );
    }
}
