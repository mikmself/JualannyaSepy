<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        ProductCategory::create([
            'name' => 'Makanan Ringan / Snack'
        ]);
        ProductCategory::create([
            'name' => 'Minuman Ringan'
        ]);
        ProductCategory::create([
            'name' => 'Makanan Berat'
        ]);
        ProductCategory::create([
            'name' => 'Minuman'
        ]);
    }
}
