<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'name' => 'Kowit',
            'address' => 'sansainoi,sansai,chiangmai',
            'phone' => '0906713255',
            'email' => 'thekickkww@gmail.com',
        ]);

        Employee::create([
            'name' => 'Vasupon',
            'address' => 'Ban Pan,Muang,Lumphun',
            'phone' => '0912354566',
            'email' => 'Vasupon@gmail.com',
        ]);

        Employee::create([
            'name' => 'Badin',
            'address' => 'Si Phum,Muang,Chiangmai',
            'phone' => '0902315455',
            'email' => 'badin@gmail.com',
        ]);
    }
}
