<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    public function run(): void
    {
        Province::insert([
            [
                'name' => 'Lampung',
            ],
            [
                'name' => 'DKI Jakarta',
            ],
            [
                'name' => 'Jawa Barat',
            ],
        ]);
    }
}