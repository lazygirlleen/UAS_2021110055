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
                   // Mondstadt Characters
                   [
                    'name' => 'Amber',
                    'rarity' => 4,
                    'nation' => 'Mondstadt',
                    'element' => 'Pyro',
                    'type' => 'Bow',
                    'faction' => 'Knight of Favonius',
                    'avatar' => 'Amber.png'
                ],
                [
                    'name' => 'Barbara',
                    'rarity' => 4,
                    'nation' => 'Mondstadt',
                    'element' => 'Hydro',
                    'type' => 'Catalyst',
                    'faction' => 'Church of Favonius',
                    'avatar' => 'Barbara.png'
                ],
                [
                    'name' => 'Jean',
                    'rarity' => 5,
                    'nation' => 'Mondstadt',
                    'element' => 'Anemo',
                    'type' => 'Sword',
                    'faction' => 'Knight of Favonius',
                    'avatar' => 'Jean.png'
                ],
                [
                    'name' => 'Diluc',
                    'rarity' => 5,
                    'nation' => 'Mondstadt',
                    'element' => 'Pyro',
                    'type' => 'Claymore',
                    'faction' => 'Dawn Winery',
                    'avatar' => 'Diluc.png'
                ],
            [
                'name' => 'Mona',
                'rarity' => 5,
                'nation' => 'Mondstadt',
                'element' => 'Hydro',
                'type' => 'Catalyst',
                'faction' => 'Mondstadt',
                'avatar' => 'Mona.png'
            ],
            [
                'name' => 'Kaeya',
                'rarity' => 4,
                'nation' => 'Mondstadt',
                'element' => 'Cryo',
                'type' => 'Sword',
                'faction' => 'Knight of Favonius',
                'avatar' => 'Kaeya.png'
            ],
            [
                'name' => 'Venti',
                'rarity' => 5,
                'nation' => 'Mondstadt',
                'element' => 'Anemo',
                'type' => 'Bow',
                'faction' => 'Mondstadt',
                'avatar' => 'Venti.png'
            ],
            [
                'name' => 'Lisa',
                'rarity' => 4,
                'nation' => 'Mondstadt',
                'element' => 'Electro',
                'type' => 'Catalyst',
                'faction' => 'Knight of Favonius',
                'avatar' => 'Lisa.jpg'
            ],
            [
                'name' => 'Klee',
                'rarity' => 5,
                'nation' => 'Mondstadt',
                'element' => 'Pyro',
                'type' => 'Catalyst',
                'faction' => 'Knight of Favonius',
                'avatar' => 'Klee.jpg'
            ],
            [
                'name' => 'Razor',
                'rarity' => 4,
                'nation' => 'Mondstadt',
                'element' => 'Electro',
                'type' => 'Claymore',
                'faction' => 'Wolvendom',
                'avatar' => 'Razor.png'
            ],
            [
                'name' => 'Bennet',
                'rarity' => 4,
                'nation' => 'Mondstadt',
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
            ],
            [
                    'name' => 'Xiangling',
                    'rarity' => 4,
                    'nation' => 'Liyue',
                    'element' => 'Pyro',
                    'type' => 'Polearm',
                    'faction' => 'Wangshu Inn',
                    'avatar' => 'Xiangling.png'
                ],
                [
                    'name' => 'Chongyun',
                    'rarity' => 4,
                    'nation' => 'Liyue',
                    'element' => 'Cryo',
                    'type' => 'Claymore',
                    'faction' => 'Exorcist',
                    'avatar' => 'Chongyun.png'
                ],
                [
                    'name' => 'Keqing',
                    'rarity' => 5,
                    'nation' => 'Liyue',
                    'element' => 'Electro',
                    'type' => 'Sword',
                    'faction' => 'Liyue Qixing',
                    'avatar' => 'Keqing.png'
                ],
                [
                    'name' => 'Qiqi',
                    'rarity' => 5,
                    'nation' => 'Liyue',
                    'element' => 'Cryo',
                    'type' => 'Sword',
                    'faction' => 'Bubu Pharmacy',
                    'avatar' => 'Qiqi.png'
                ],
                [
                    'name' => 'Zhongli',
                    'rarity' => 5,
                    'nation' => 'Liyue',
                    'element' => 'Geo',
                    'type' => 'Polearm',
                    'faction' => 'Wangsheng Funeral Parlor',
                    'avatar' => 'Zhongli.png'
                ],
                [
                    'name' => 'Xiao',
                    'rarity' => 5,
                    'nation' => 'Liyue',
                    'element' => 'Anemo',
                    'type' => 'Polearm',
                    'faction' => 'Liyue',
                    'avatar' => 'Xiao.png'
                ],
                [
                    'name' => 'Beidou',
                    'rarity' => 4,
                    'nation' => 'Liyue',
                    'element' => 'Electro',
                    'type' => 'Claymore',
                    'faction' => 'Crux Fleet',
                    'avatar' => 'Beidou.png'
                ],
                [
                    'name' => 'Ningguang',
                    'rarity' => 4,
                    'nation' => 'Liyue',
                    'element' => 'Geo',
                    'type' => 'Catalyst',
                    'faction' => 'Liyue Qixing',
                    'avatar' => 'Ningguang.png'
                ],
                [
                    'name' => 'Ganyu',
                    'rarity' => 5,
                    'nation' => 'Liyue',
                    'element' => 'Cryo',
                    'type' => 'Bow',
                    'faction' => 'Liyue Qixing',
                    'avatar' => 'Ganyu.png'
                ],
                [
                    'name' => 'Hu Tao',
                    'rarity' => 5,
                    'nation' => 'Liyue',
                    'element' => 'Pyro',
                    'type' => 'Polearm',
                    'faction' => 'Wangsheng Funeral Parlor',
                    'avatar' => 'HuTao.png'
                ],
                    [
                            'name' => 'Raiden Shogun',
                            'rarity' => 5,
                            'nation' => 'Inazuma',
                            'element' => 'Electro',
                            'type' => 'Polearm',
                            'faction' => 'Electro Archon',
                            'avatar' => 'RaidenShogun.png'
                        ],
                        [
                            'name' => 'Kamisato Ayaka',
                            'rarity' => 5,
                            'nation' => 'Inazuma',
                            'element' => 'Cryo',
                            'type' => 'Sword',
                            'faction' => 'Yashiro Commission',
                            'avatar' => 'KamisatoAyaka.png'
                        ],
                        [
                            'name' => 'Kamisato Ayato',
                            'rarity' => 5,
                            'nation' => 'Inazuma',
                            'element' => 'Hydro',
                            'type' => 'Sword',
                            'faction' => 'Yashiro Commission',
                            'avatar' => 'KamisatoAyato.png'
                        ],
                        [
                            'name' => 'Yoimiya',
                            'rarity' => 5,
                            'nation' => 'Inazuma',
                            'element' => 'Pyro',
                            'type' => 'Bow',
                            'faction' => 'Naganohara Fireworks',
                            'avatar' => 'Yoimiya.png'
                        ],
                        [
                            'name' => 'Thoma',
                            'rarity' => 4,
                            'nation' => 'Inazuma',
                            'element' => 'Pyro',
                            'type' => 'Polearm',
                            'faction' => 'Yashiro Commission',
                            'avatar' => 'Thoma.png'
                        ],
                        [
                            'name' => 'Sayu',
                            'rarity' => 4,
                            'nation' => 'Inazuma',
                            'element' => 'Anemo',
                            'type' => 'Claymore',
                            'faction' => 'Shuumatsuban',
                            'avatar' => 'Sayu.png'
                        ],
                        [
                            'name' => 'Kujou Sara',
                            'rarity' => 4,
                            'nation' => 'Inazuma',
                            'element' => 'Electro',
                            'type' => 'Bow',
                            'faction' => 'Tenryou Commission',
                            'avatar' => 'KujouSara.png'
                        ],
                        [
                            'name' => 'Arataki Itto',
                            'rarity' => 5,
                            'nation' => 'Inazuma',
                            'element' => 'Geo',
                            'type' => 'Claymore',
                            'faction' => 'Arataki Gang',
                            'avatar' => 'AratakiItto.png'
                        ],
                        [
                            'name' => 'Shikanoin Heizou',
                            'rarity' => 4,
                            'nation' => 'Inazuma',
                            'element' => 'Anemo',
                            'type' => 'Catalyst',
                            'faction' => 'Tenryou Commission',
                            'avatar' => 'ShikanoinHeizou.png'
                        ],
                        [
                            'name' => 'Yae Miko',
                            'rarity' => 5,
                            'nation' => 'Inazuma',
                            'element' => 'Electro',
                            'type' => 'Catalyst',
                            'faction' => 'Grand Narukami Shrine',
                            'avatar' => 'YaeMiko.png'
                        ],
                        [
                            'name' => 'Gorou',
                            'rarity' => 4,
                            'nation' => 'Inazuma',
                            'element' => 'Geo',
                            'type' => 'Bow',
                            'faction' => 'Resistance Army',
                            'avatar' => 'Gorou.png'
                        ],
                        [
                            'name' => 'Sangonomiya Kokomi',
                            'rarity' => 5,
                            'nation' => 'Inazuma',
                            'element' => 'Hydro',
                            'type' => 'Catalyst',
                            'faction' => 'Watatsumi Island',
                            'avatar' => 'Kokomi.png'
                        ],
                        [
                            'name' => 'Nahida',
                            'rarity' => 5,
                            'nation' => 'Sumeru',
                            'element' => 'Dendro',
                            'type' => 'Catalyst',
                            'faction' => 'Dendro Archon',
                            'avatar' => 'Nahida.png'
                        ],
                        [
                            'name' => 'Tighnari',
                            'rarity' => 5,
                            'nation' => 'Sumeru',
                            'element' => 'Dendro',
                            'type' => 'Bow',
                            'faction' => 'Amurta Darshan',
                            'avatar' => 'Tighnari.png'
                        ],
                        [
                            'name' => 'Alhaitham',
                            'rarity' => 5,
                            'nation' => 'Sumeru',
                            'element' => 'Dendro',
                            'type' => 'Sword',
                            'faction' => 'Haravatat Darshan',
                            'avatar' => 'Alhaitham.png'
                        ],
                        [
                            'name' => 'Nilou',
                            'rarity' => 5,
                            'nation' => 'Sumeru',
                            'element' => 'Hydro',
                            'type' => 'Sword',
                            'faction' => 'Zubayr Theater',
                            'avatar' => 'Nilou.png'
                        ],
                        [
                            'name' => 'Cyno',
                            'rarity' => 5,
                            'nation' => 'Sumeru',
                            'element' => 'Electro',
                            'type' => 'Polearm',
                            'faction' => 'General Mahamatra',
                            'avatar' => 'Cyno.png'
                        ],
                        [
                            'name' => 'Dehya',
                            'rarity' => 5,
                            'nation' => 'Sumeru',
                            'element' => 'Pyro',
                            'type' => 'Claymore',
                            'faction' => 'Eremites',
                            'avatar' => 'Dehya.png'
                        ],
                        [
                            'name' => 'Collei',
                            'rarity' => 4,
                            'nation' => 'Sumeru',
                            'element' => 'Dendro',
                            'type' => 'Bow',
                            'faction' => 'Ranger of the Avidya Forest',
                            'avatar' => 'Collei.png'
                        ],
                        [
                            'name' => 'Dori',
                            'rarity' => 4,
                            'nation' => 'Sumeru',
                            'element' => 'Electro',
                            'type' => 'Claymore',
                            'faction' => 'Merchant',
                            'avatar' => 'Dori.png'
                        ],
                        [
                            'name' => 'Kaveh',
                            'rarity' => 4,
                            'nation' => 'Sumeru',
                            'element' => 'Dendro',
                            'type' => 'Claymore',
                            'faction' => 'Architect',
                            'avatar' => 'Kaveh.png'
                        ],
                        [
                            'name' => 'Layla',
                            'rarity' => 4,
                            'nation' => 'Sumeru',
                            'element' => 'Cryo',
                            'type' => 'Sword',
                            'faction' => 'Rtawahist Darshan',
                            'avatar' => 'Layla.png'
                        ],
                        [
                            'name' => 'Faruzan',
                            'rarity' => 4,
                            'nation' => 'Sumeru',
                            'element' => 'Anemo',
                            'type' => 'Bow',
                            'faction' => 'Haravatat Darshan',
                            'avatar' => 'Faruzan.png'
                        ],
                        [
                            'name' => 'Lynette',
                            'rarity' => 4,
                            'nation' => 'Fontaine',
                            'element' => 'Anemo',
                            'type' => 'Sword',
                            'faction' => 'Felines of Fontaine',
                            'avatar' => 'Lynette.png'
                        ],
                        [
                            'name' => 'Lyney',
                            'rarity' => 5,
                            'nation' => 'Fontaine',
                            'element' => 'Pyro',
                            'type' => 'Bow',
                            'faction' => 'Felines of Fontaine',
                            'avatar' => 'Lyney.png'
                        ],
                        [
                            'name' => 'Freminet',
                            'rarity' => 4,
                            'nation' => 'Fontaine',
                            'element' => 'Cryo',
                            'type' => 'Claymore',
                            'faction' => 'Diver',
                            'avatar' => 'Freminet.png'
                        ],
                        [
                            'name' => 'Furina',
                            'rarity' => 5,
                            'nation' => 'Fontaine',
                            'element' => 'Hydro',
                            'type' => 'Sword',
                            'faction' => 'Hydro Archon',
                            'avatar' => 'Furina.png'
                        ],
                        [
                            'name' => 'Clorinde',
                            'rarity' => 5,
                            'nation' => 'Fontaine',
                            'element' => 'Electro',
                            'type' => 'Sword',
                            'faction' => 'Fontaine Justice',
                            'avatar' => 'Clorinde.png'
                        ],
                        [
                            'name' => 'Neuvillette',
                            'rarity' => 5,
                            'nation' => 'Fontaine',
                            'element' => 'Hydro',
                            'type' => 'Catalyst',
                            'faction' => 'Chief Justice',
                            'avatar' => 'Neuvillette.png'
                        ],
                        [
                            'name' => 'Charlotte',
                            'rarity' => 4,
                            'nation' => 'Fontaine',
                            'element' => 'Cryo',
                            'type' => 'Catalyst',
                            'faction' => 'Steambird Reporter',
                            'avatar' => 'Charlotte.png'
                        ]
                    ]);
            }
        }
