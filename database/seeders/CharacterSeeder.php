<?php

namespace Database\Seeders;

use App\Models\Character;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(__DIR__ . '/data/characters.json');
        $characters = json_decode($json, true);
        foreach ($characters as $character) {
            $newCharacter = new Character();
            $newCharacter->name = $character['name'];
            $newCharacter->description = $character['description'];
            $newCharacter->attack = $character['attack'];
            $newCharacter->defence = $character['defence'];
            $newCharacter->speed = $character['speed'];
            $newCharacter->life = $character['life'];
            $newCharacter->save();
        }
    }
}
