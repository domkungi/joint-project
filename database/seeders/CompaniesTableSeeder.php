<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name' => 'Handsome',
            'address' => 'Nimmana Haeminda Rd Lane 1, Suthep, Mueang',
            'country' => 'Thailand',
            'city' => 'Chiangmai',
            'zipcode' => '50000',
            'email' => 'handsome@gmail.com',
            'phone' => '444-4562130',

        ]);
    }
}
