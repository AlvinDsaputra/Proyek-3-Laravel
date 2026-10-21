<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'nama_lengkap' => 'Administrator',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['username' => 'staff1'],
            [
                'nama_lengkap' => 'Staff Toko',
                'password' => Hash::make('password124'),
                'role' => 'staff',
            ]
        );

        User::updateOrCreate(
            ['username' => 'budi'],
            [
                'nama_lengkap' => 'Budi Customer',
                'password' => Hash::make('password125'),
                'role' => 'customer',
            ]
        );
    }
}