<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'name' => 'Rendra',
            'email' => 'rendragituloh@gmail.com',
            'date_of_birth' => '2011-11-11',
            'city' => 'Jogja'
        ]);

        Employee::create([
            'name' => 'Khariz',
            'email' => 'kharizajaah@gmail.com',
            'date_of_birth' => '2012-12-12',
            'city' => 'Bantul'
        ]);

        Employee::create([
            'name' => 'Joko',
            'email' => 'jokoterdepan@gmail.com',
            'date_of_birth' => '2010-10-10',
            'city' => 'Sleman'
        ]);

        Employee::create([
            'name' => 'Mariyam',
            'email' => 'mariyamyuk@gmail.com',
            'date_of_birth' => '2009-9-9',
            'city' => 'Gunung Kidul'
        ]);

    }
}
