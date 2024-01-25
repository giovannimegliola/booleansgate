<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = file_get_contents(__DIR__ . '/data/items.json');
        $items = json_decode($items, true);

        foreach ($items as $item) {
            $newItem = new Item();
            $newItem->name = $item['name'];
            $newItem->image = ItemSeeder::storeImage($item['name']);
            $newItem->slug = $item['slug'];
            $newItem->type = $item['type'];
            $newItem->category = $item['category'];
            $newItem->weight = $item['weight'];
            $newItem->cost = $item['cost'];
            $newItem->description = $item['description'];
            $newItem->save();
        }
    }
    public function storeImage($name)
    {
        $contents = file_get_contents(__DIR__ . '/items/' . $name . '.gif');
        $path = 'img/' . $name . '.gif';
        Storage::put('img/' . $name . 'gif', $contents);
        return $path;
    }
}
