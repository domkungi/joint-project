<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'name' =>  'Mr.Pham Nhat Vuong',
            'company_name' => 'VinFast',
            'address' => 'Floor 7, Symphony Tower , Chu Huy Man Street, Vinhomes Riverside Long Bien, Long Bien',
            'country' => 'Vietnnam',
            'city' => 'Hanoi',
            'zipcode' => '111222',
            'email' => 'VinFast.vietnam@gmail.com',
            'phone' => '6664233112',
            'type' => 'member',
            

        ]);

        Customer::create([
            'name' =>  'Ms.Indah Nur',
            'company_name' => 'Carmudi',
            'address' => 'Jl Karunrung 5, Sulawesi Selatan,Sulawesi Selatan ',
            'country' => 'Indonesia',
            'city' => 'Makassar',
            'zipcode' => '90113',
            'email' => 'Carmudi.indo@gmail.com',
            'phone' => '0-411-32-4243',
            'type' => 'general',
            'payment' => 1500000

        ]);

        Customer::create([
            'name' =>  'Ms.Amina Putri',
            'company_name' => 'Farah Cartech',
            'address' => '20-3 Jalan Damar SD 15/1, Bandar Sri Damansara',
            'country' => 'Malaysia',
            'city' => ' Kuala Lumpur',
            'zipcode' => '90113',
            'email' => 'FarahCartech.malaysia@gmail.com',
            'phone' => '03-6274-9239',
            'type' => 'member',
            'payment' => 500000

        ]);
    }
}
