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
            'name'        => 'Rifko Febry Al Aziz',
            'email'       => 'rifkofebryalaziz30@gmail.com',
            'password'    =>  Hash::make('inipassword'),
        ]); 

        User::create([
            'name'        => 'Muhammad Alim Mudin',
            'email'       => 'alim@gmail.com',
            'password'    =>  Hash::make('alim123'),
        ]);
    }
}
