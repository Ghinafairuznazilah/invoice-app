<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Customer::create([
            'CompanyName' => 'PT. Indonesia Jaya',
            'phone' => '012345678',
            'address' => 'Bandung',
            'email' => 'PTIndonesiaJaya@gmail.com'
        ]);

        Customer::create([
            'CompanyName' => 'PT. Aku Sehat',
            'phone' => '012345679',
            'address' => 'Jakarta',
            'email' => 'PTAkuSehat@gmail.com'
        ]);


    }
}
