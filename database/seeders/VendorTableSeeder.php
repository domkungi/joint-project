<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;

class VendorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vendor::create([
            'name' =>  'Toyota',
            'address' => 'Kurokawa District',
            'country' => 'Japan',
            'city' => 'Miyaki',
            'zipcode' => '111222',
            'email' => 'Toyota.japan@gmail.com',
            'phone' => '5554233112',

        ]);

    }
}
