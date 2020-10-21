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
            'name' =>  'Toyota Motor Corporation',
            'address' => 'Kurokawa District',
            'country' => 'Japan',
            'city' => 'Miyaki',
            'zipcode' => '111222',
            'email' => 'Toyota.japan@gmail.com',
            'phone' => '5554233112',

        ]);
        Vendor::create([
            'name' =>  'Honda Motor Co., Ltd.',
            'address' => 'Hamamatsu Shizuoka',
            'country' => 'Japan',
            'city' => 'Minato',
            'zipcode' => '562113',
            'email' => 'Honda.japan@gmail.com',
            'phone' => '6122233112',

        ]);

        Vendor::create([
            'name' =>  'Mazda Motor Corporation',
            'address' => 'Kurokawa District',
            'country' => 'Thailand',
            'city' => 'Miyaki',
            'zipcode' => '111222',
            'email' => 'mazdamotor@hotmail.co.th',
            'phone' => '5552135648',

        ]);

        Vendor::create([
            'name' =>  'Nissan Motor',
            'address' => 'Kurokawa District',
            'country' => 'Thailand',
            'city' => 'Miyaki',
            'zipcode' => '111222',
            'email' => 'nissanmotor@hotmail.co.th',
            'phone' => '5558975462',

        ]);


    }
}
