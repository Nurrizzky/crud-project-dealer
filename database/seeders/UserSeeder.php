<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'A-adminTes',
            'email' => 'adminTes@example.com',
            'role' => 'admin',
            'password' => bcrypt('adminTes'),
        ],);

        User::create([
            'name' => 'A-karyawanTes',
            'email' => 'karyawanTes@example.com',
            'role' => 'karyawan',
            'password' => bcrypt('karyawanTes'),
        ]);
    }
}
