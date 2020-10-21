<?php

namespace Database\Seeders;

use App\Models\Storage;
use Illuminate\Database\Seeder;

class StoragesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::create([
            'company_id' => 1,
            'country' => 'Thailand',
        ]);

        Storage::create([
            'company_id' => 1,
            'country' => 'China',
        ]);

        Storage::create([
            'company_id' => 1,
            'country' => 'Laos',
        ]);

        Storage::create([
            'company_id' => 1,
            'country' => 'Singapore',
        ]);
    }
}
