<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

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
            $newItem->slug = $item['slug'];
            $newItem->type = $item['type'];
            $newItem->category = $item['category'];
            $newItem->weight = $item['weight'];
            $newItem->cost = $item['cost'];
            $newItem->save();
        }
    }
}
