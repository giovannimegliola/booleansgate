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
            $newCharacter->attack = $character['attack'];
            $newCharacter->defence = $character['defence'];
            $newCharacter->speed = $character['speed'];
            $newCharacter->life = $character['life'];
            $newCharacter->type_id = $character['type_id'];

            $newCharacter->save();
            $newCharacter->items()->sync($items->random(3));
        }
    }

    public static function storeimage($img, $name)
    {
        //$url = 'https:' . $img;
        $url = $img;
        $contents = file_get_contents($url);
        // $temp_name = substr($url, strrpos($url, '/') + 1);
        // $name = substr($temp_name, 0, strpos($temp_name, '?')) . '.jpg';
        $name = Str::slug($name, '-') . '.jpg';
        $path = 'images/' . $name;
        Storage::put('images/' . $name, $contents);
        return $path;
    }
}
