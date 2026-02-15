<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Utama',
            'nip' => '1987654321',
            'nisnim' => null,
            'email' => 'admin@magang.com',
            'password' => Hash::make('123123123'),
            'role' => 'admin',
            'status' => 'active',
        ]);
        User::create([
            'name' => 'Pemagang Contoh',
            'nip' => null,
            'nisnim' => '1234567890',
            'email' => 'pemagang@magang.com',
            'password' => Hash::make('123123123'),
            'role' => 'pemagang',
            'status' => 'active',
        ]);
    }
}
