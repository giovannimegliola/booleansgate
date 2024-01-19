<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\Item;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
        $items = Item::all();

        foreach ($characters as $character) {
            $newCharacter = new Character();
            $newCharacter->name = $character['name'];
            $newCharacter->description = $character['description'];
            $newCharacter->image = CharacterSeeder::storeimage($character['name']);
            $newCharacter->attack = $character['attack'];
            $newCharacter->defence = $character['defence'];
            $newCharacter->speed = $character['speed'];
            $newCharacter->life = $character['life'];
            $newCharacter->type_id = $character['type_id'];

            $newCharacter->save();
            $newCharacter->items()->sync($items->random(3));
        }
    }

    public static function storeimage($name)
    {
        //$url = 'https:' . $img;
        $contents = file_get_contents(__DIR__ . '/images/' . $name . '.gif');
        // $temp_name = substr($url, strrpos($url, '/') + 1);
        // $name = substr($temp_name, 0, strpos($temp_name, '?')) . '.jpg';
        $path = 'images/' . $name . '.gif';
        Storage::put('images/' . $name . '.gif', $contents);
        return $path;
    }
}
