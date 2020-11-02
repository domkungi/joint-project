<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Toyota VIOS 2020',
            'color' => 'White',
            'sale_price' => 19000
        ]);

        Product::create([
            'name' => 'Toyota Yaris 2020',
            'color' => 'Black',
            'sale_price' => 15000
        ]);

        Product::create([
            'name' => 'Toyota Camry 2020',
            'color' => 'Red',
            'sale_price' => 25000
        ]);

        Product::create([
            'name' => 'Honda Civic 2020',
            'color' => 'Gray',
            'sale_price' => 20000
        ]);
          
        Product::create([
            'name' => 'Honda City 2020',
            'color' => 'Black',
            'sale_price' => 20000
        ]);
          
        Product::create([
            'name' => 'Honda Jazz 2020',
            'color' => 'Red',
            'sale_price' => 17000
        ]);
          
        Product::create([
            'name' => 'Mazda 2 2020',
            'color' => 'White',
            'sale_price' => 15000
        ]);
          
        Product::create([
            'name' => 'Mazda 3 2020',
            'color' => 'Gray',
            'sale_price' => 23000
        ]);
          
        Product::create([
            'name' => 'Mazda CX-3 2020',
            'color' => 'Black',
            'sale_price' => 20000
        ]);
          
        Product::create([
            'name' => 'Nissan Almera 2020',
            'color' => 'White',
            'sale_price' => 25000
        ]);
          
        Product::create([
            'name' => 'Nissan March 2020',
            'color' => 'Gray',
            'sale_price' => 17000
        ]);
          
        Product::create([
            'name' => 'Nissan Note 2020',
            'color' => 'Red',
            'sale_price' => 13000
        ]);
         
    }
}
