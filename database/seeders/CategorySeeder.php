<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            [
                'name' => 'Elektronik',
                'slug' => 'elektronik'
            ],
            [
                'name' => 'Laptop',
                'slug' => 'laptop'
            ],
            [
                'name' => 'Smartphone',
                'slug' => 'smartphone'
            ],
            [
                'name' => 'Fashion',
                'slug' => 'fashion'
            ],
            [
                'name' => 'Kendaraan',
                'slug' => 'kendaraan'
            ]
        ]);
    }
}
