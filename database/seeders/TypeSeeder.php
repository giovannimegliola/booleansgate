<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = file_get_contents(__DIR__ . '/data/types.json');
        $types = json_decode($types, true);

        foreach ($types as $type) {
            $newType = new Type();
            $newType->name = $type['name'];
            $newType->desc = $type['desc'];
            // $newType->image = TypeSeeder::storeImage($type['image'], $type['name']);
            $newType->save();
        }
    }

    // public function storeImage($img, $name)
    // {
    //     $url = $img;
    //     $contents = file_get_contents($url);
    //     $name = Str::slug($name, '-') . 'jpg';
    //     $path = 'images/' . $name;
    //     Storage::put($path, $contents);
    //     return $path;
    // }
}
