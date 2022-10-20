<?php

namespace Database\Seeders;

use App\Models\DetailInvoice;
use Illuminate\Database\Seeder;

class DetailInvoicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DetailInvoice::create([
            'invoice_id' => 1,
            'product_id' => 1,
            'quantity' => 2,
            'amount_price' => 400000, 
            'total_payments' => 400000, 
        ]);

        DetailInvoice::create([
            'invoice_id' => 1,
            'product_id' => 1,
            'quantity' => 1, 
            'amount_price' => 400000, 
            'total_payments' => 400000, 
        ]);

        DetailInvoice::create([
            'invoice_id' => 1,
            'product_id' => 3,
            'quantity' => 3, 
            'amount_price' => 450000, 
            'total_payments' => 450000, 
        ]);

        DetailInvoice::create([
            'invoice_id' => 1,
            'product_id' => 3,
            'quantity' => 3, 
            'amount_price' => 450000, 
            'total_payments' => 450000, 
        ]);

        DetailInvoice::create([
            'invoice_id' => 1,
            'product_id' => 3,
            'quantity' => 3, 
            'amount_price' => 450000, 
            'total_payments' => 450000, 
        ]);

        DetailInvoice::create([
            'invoice_id' => 2,
            'product_id' => 1,
            'quantity' => 2, 
            'amount_price' => 400000, 
            'total_payments' => 400000, 
        ]);
        DetailInvoice::create([
            'invoice_id' => 2,
            'product_id' => 3,
            'quantity' => 3, 
            'amount_price' => 450000, 
            'total_payments' => 450000, 
        ]);
    }
}
