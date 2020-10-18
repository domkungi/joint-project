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
            'color' => 'white',
        ]);

        Product::create([
            'name' => 'Honda City 2020',
            'color' => 'Black',
        ]);

        Product::create([
            'name' => 'BMW SERIES-3 2020',
            'color' => 'Gray',
        ]);
    }
}
