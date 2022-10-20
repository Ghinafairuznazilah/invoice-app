<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call(CustomersSeeder::class);
        $this->call(ItemTypesSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(InvoicesSeeder::class);
        $this->call(DetailInvoicesSeeder::class);
        
    }
}
