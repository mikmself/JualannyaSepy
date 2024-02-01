<?php

namespace Database\Seeders;

use App\Models\Shipping;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingSeeder extends Seeder
{
    public function run(): void
    {
        Shipping::create([
            'name' => 'Ambil Ditempat',
            'price' => 0
        ]);
        Shipping::create([
            'name' => 'Gosend',
            'price' => 5000
        ]);
        Shipping::create([
            'name' => 'Paketku',
            'price' => 700
        ]);
    }
}
