<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'telephone' => '081229473829',
            'address' => 'Jl ITTP Telkom Purwokerto',
            'password' => Hash::make('admin'),
            'level' => 'admin'
        ]);
        User::create([
            'name' => 'Andi',
            'email' => 'andi@gmail.com',
            'telephone' => '087794248743',
            'address' => 'Jl ITTP Telkom Purwokerto',
            'password' => Hash::make('user'),
            'level' => 'user'
        ]);
    }
}
