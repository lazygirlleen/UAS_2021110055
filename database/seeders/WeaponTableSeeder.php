<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeaponTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('weapons')->delete();

        DB::table('weapons')->insert([
            [
                'name' => 'Aquila Favonia',
                'rarity' => 5,
                'type' => 'Sword',
                'base_atk' => 674,
                'secondary_stat' => 'Physical DMG Bonus',
                'secondary_stat_value' => '41.3%',
            ],
            [
                'name' => 'Skyward Blade',
                'rarity' => 5,
                'type' => 'Sword',
                'base_atk' => 608,
                'secondary_stat' => 'Energy Recharge',
                'secondary_stat_value' => '55.1%',
            ],
            [
                'name' => 'Primordial Jade Winged-Spear',
                'rarity' => 5,
                'type' => 'Polearm',
                'base_atk' => 674,
                'secondary_stat' => 'CRIT Rate',
                'secondary_stat_value' => '22.1%',
            ],
            [
                'name' => 'Skyward Harp',
                'rarity' => 5,
                'type' => 'Bow',
                'base_atk' => 674,
                'secondary_stat' => 'CRIT Rate',
                'secondary_stat_value' => '22.1%',
            ],
            [
                'name' => 'Lost Prayer to the Sacred Winds',
                'rarity' => 5,
                'type' => 'Catalyst',
                'base_atk' => 608,
                'secondary_stat' => 'CRIT Rate',
                'secondary_stat_value' => '33.1%',
            ],
            [
                'name' => 'Wolf\'s Gravestone',
                'rarity' => 5,
                'type' => 'Claymore',
                'base_atk' => 608,
                'secondary_stat' => 'ATK',
                'secondary_stat_value' => '49.6%',
            ],
            [
                'name' => 'Favonius Sword',
                'rarity' => 4,
                'type' => 'Sword',
                'base_atk' => 454,
                'secondary_stat' => 'Energy Recharge',
                'secondary_stat_value' => '61.3%',
            ],
            [
                'name' => 'The Flute',
                'rarity' => 4,
                'type' => 'Sword',
                'base_atk' => 510,
                'secondary_stat' => 'ATK',
                'secondary_stat_value' => '41.3%',
            ],
            [
                'name' => 'Dragon’s Bane',
                'rarity' => 4,
                'type' => 'Polearm',
                'base_atk' => 454,
                'secondary_stat' => 'Elemental Mastery',
                'secondary_stat_value' => '221',
            ],
            [
                'name' => 'Favonius Lance',
                'rarity' => 4,
                'type' => 'Polearm',
                'base_atk' => 565,
                'secondary_stat' => 'Energy Recharge',
                'secondary_stat_value' => '30.6%',
            ],
            [
                'name' => 'Sacrificial Bow',
                'rarity' => 4,
                'type' => 'Bow',
                'base_atk' => 565,
                'secondary_stat' => 'Energy Recharge',
                'secondary_stat_value' => '30.6%',
            ],
            [
                'name' => 'The Widsith',
                'rarity' => 4,
                'type' => 'Catalyst',
                'base_atk' => 510,
                'secondary_stat' => 'CRIT DMG',
                'secondary_stat_value' => '55.1%',
            ],
            [
                'name' => 'Prototype Archaic',
                'rarity' => 4,
                'type' => 'Claymore',
                'base_atk' => 565,
                'secondary_stat' => 'ATK',
                'secondary_stat_value' => '27.6%',
            ],
            [
                'name' => 'Whiteblind',
                'rarity' => 4,
                'type' => 'Claymore',
                'base_atk' => 510,
                'secondary_stat' => 'DEF',
                'secondary_stat_value' => '51.7%',
            ],
            [
                'name' => 'Rust',
                'rarity' => 4,
                'type' => 'Bow',
                'base_atk' => 510,
                'secondary_stat' => 'ATK',
                'secondary_stat_value' => '41.3%',
            ],
            [
                'name' => 'Magic Guide',
                'rarity' => 3,
                'type' => 'Catalyst',
                'base_atk' => 354,
                'secondary_stat' => 'Elemental Mastery',
                'secondary_stat_value' => '187',
            ],
            [
                'name' => 'Debate Club',
                'rarity' => 3,
                'type' => 'Claymore',
                'base_atk' => 401,
                'secondary_stat' => 'ATK',
                'secondary_stat_value' => '35.2%',
            ],
            [
                'name' => 'Slingshot',
                'rarity' => 3,
                'type' => 'Bow',
                'base_atk' => 354,
                'secondary_stat' => 'CRIT Rate',
                'secondary_stat_value' => '31.2%',
            ],
            [
                'name' => 'Skyrider Sword',
                'rarity' => 3,
                'type' => 'Sword',
                'base_atk' => 354,
                'secondary_stat' => 'Energy Recharge',
                'secondary_stat_value' => '43.8%',
            ],
            [
                'name' => 'White Tassel',
                'rarity' => 3,
                'type' => 'Polearm',
                'base_atk' => 401,
                'secondary_stat' => 'CRIT Rate',
                'secondary_stat_value' => '23.4%',
            ],
        ]);
    }
}

