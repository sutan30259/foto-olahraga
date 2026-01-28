<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Buat user admin (Fotografer)
        $admin = User::create([
        'name' => 'Admin Fotografer',
        'email'=> 'admin@gmail.com',
        'password' => Hash::make('12345'), //Passwordnya:12345
        ]);

        // kasih role admin
        $admin->asignRole('admin');

        // 2. Buat User Klient (contoh pembeli)
        $klient = User::create([
            'name' => 'Budi Klient',
            'email' => 'klient@gmail.com',
            'password' => Hash::make('12345'), // passwordnya 12345
        ]);

        //kasih role klient
        $klient->assignRole('klient');
    }
}
