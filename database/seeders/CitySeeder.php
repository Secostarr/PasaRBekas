<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        City::insert([
            [
                'province_id' => 1,
                'name' => 'Bandar Lampung',
            ],
            [
                'province_id' => 1,
                'name' => 'Metro',
            ],
            [
                'province_id' => 1,
                'name' => 'Lampung Selatan',
            ],
            [
                'province_id' => 1,
                'name' => 'Lampung Tengah',
            ],
            [
                'province_id' => 1,
                'name' => 'Lampung Timur',
            ],
        ]);
    }
}