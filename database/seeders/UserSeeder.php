<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'name' => 'Rendra',
            'email' => 'rendragituloh@gmail.com',
            'password' => Hash::make('user123'),
            'status' => 'active'
        ]);

        User::create([
            'name' => 'Khariz',
            'email' => 'kharizajaah@gmail.com',
            'password' => Hash::make('user123'),
            'status' => 'active'
        ]);

        User::create([
            'name' => 'Joko',
            'email' => 'joko@gmail.com',
            'password' => Hash::make('user123'),
            'status' => 'active'
        ]);

        User::create([
            'name' => 'Mariyam',
            'email' => 'mariyamyuk@gmail.com',
            'password' => Hash::make('user123'),
            'status' => 'active'
        ]);

    }
}
