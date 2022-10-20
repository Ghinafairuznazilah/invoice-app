<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Product::create([
            'itemtype_id' => 1,
            'description' => 'Design',
            'Price' => 200000,
            
        ]);

        Product::create([
            'itemtype_id' => 1,
            'description' => 'Development',
            'Price' => 400000,
           
        ]);

        Product::create([
            'itemtype_id' => 1,
            'description' => 'Meetings',
            'Price' => 150000,
            
        ]);

        Product::create([
            'itemtype_id' => 2,
            'description' => 'Paid Promote',
            'Price' => 100000,
        ]);
    }
}
