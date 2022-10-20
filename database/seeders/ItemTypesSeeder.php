<?php

namespace Database\Seeders;

use App\Models\ItemType;
use Illuminate\Database\Seeder;

class ItemTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ItemType::create([
            'item_type' => 'Service',
        ]);

        ItemType::create([
            'item_type' => 'Promote',
        ]);
    }
}
