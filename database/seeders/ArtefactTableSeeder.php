<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtefactTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('artefacts')->delete();

        DB::table('artefacts')->insert([

            [
                'set' => 'Gladiator\'s Finale',
                'rarity' => 5,
                'set_bonus' => 'ATK +18%; 4-Piece Bonus: Increases Normal Attack DMG by 35% when using a Sword, Claymore, or Polearm.',
            ],
            [
                'set' => 'Noblesse Oblige',
                'rarity' => 5,
                'set_bonus' => 'Elemental Burst DMG +20%; 4-Piece Bonus: Increases all party members\' ATK by 20% for 12s after using an Elemental Burst.',
            ],
            [
                'set' => 'Crimson Witch of Flames',
                'rarity' => 5,
                'set_bonus' => 'Pyro DMG Bonus +15%; 4-Piece Bonus: Increases Overloaded and Burning DMG by 40%, Vaporize and Melt DMG by 15%.',
            ],
            [
                'set' => 'Thundering Fury',
                'rarity' => 5,
                'set_bonus' => 'Electro DMG Bonus +15%; 4-Piece Bonus: Increases damage caused by Overloaded, Electro-Charged, and Superconduct by 40%.',
            ],
            [
                'set' => 'Blizzard Strayer',
                'rarity' => 5,
                'set_bonus' => 'Cryo DMG Bonus +15%; 4-Piece Bonus: Increases CRIT Rate against frozen or Cryo-affected enemies by 20%.',
            ],
            [
                'set' => 'Wanderer\'s Troupe',
                'rarity' => 5,
                'set_bonus' => 'Elemental Mastery +80; 4-Piece Bonus: Increases charged attack DMG by 35% if the character uses a Catalyst or a Bow.',
            ],
            [
                'set' => 'Viridescent Venerer',
                'rarity' => 5,
                'set_bonus' => 'Anemo DMG Bonus +15%; 4-Piece Bonus: Increases swirl reaction DMG by 60%, and reduces enemies\' Anemo RES by 40% for 10s.',
            ],
            [
                'set' => 'Retracing Bolide',
                'rarity' => 5,
                'set_bonus' => 'Geo DMG Bonus +15%; 4-Piece Bonus: Increases shield strength by 35%, and characters protected by a shield will have their CRIT Rate increased by 40%.',
            ],
            [
                'set' => 'Lavawalker',
                'rarity' => 5,
                'set_bonus' => 'Pyro DMG Bonus +15%; 4-Piece Bonus: Increases resistance to Pyro DMG by 40%. When protected by a shield, increases resistance to all elemental damage by 35%.',
            ],
            [
                'set' => 'Maiden Beloved',
                'rarity' => 5,
                'set_bonus' => 'Healing Bonus +15%; 4-Piece Bonus: Increases healing received by all party members by 20%.',
            ],

        ]);

    }
}

