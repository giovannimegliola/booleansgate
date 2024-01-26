<?php

namespace Database\Seeders;

use App\Models\Arena;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArenaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = ['Lava Arena', 'Temple', 'Waterfall Sight', 'Ascension', 'Hacker Room', 'Cathedral Ruins'];

        foreach ($names as $name) {
            $newArena = new Arena();
            $newArena->name = $name;
            $newArena->slug = Str::slug($name, '-');
            $newArena->image = ArenaSeeder::storeimage($name);
            $newArena->save();
        }
    }

    public static function storeimage($name)
    {
        //$url = 'https:' . $img;
        $contents = file_get_contents(__DIR__ . '/arenas/' . $name . '.gif');
        // $temp_name = substr($url, strrpos($url, '/') + 1);
        // $name = substr($temp_name, 0, strpos($temp_name, '?')) . '.jpg';
        $path = 'arenas/' . $name . '.gif';
        Storage::put('public/arenas/' . $name . '.gif', $contents);
        return $path;
    }
}
