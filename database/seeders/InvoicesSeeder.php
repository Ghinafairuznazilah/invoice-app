<?php

namespace Database\Seeders;

use App\Models\Invoice;
use Illuminate\Database\Seeder;

class InvoicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Invoice::create([
            'customer_id' => 1,
            'subject' => 'Spring Marketing Campaign',
            'dari' => 'PT Esensi Solusi Buana'
        ]);

        Invoice::create([
            'customer_id' => 2,
            'subject' => 'Spring Marketing Campaign',
            'dari' => 'PT Esensi Solusi Buana'
        ]);
    }
}
