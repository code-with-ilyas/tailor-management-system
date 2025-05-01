<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'faizan',
                'email' => 'net9ikramm@gmail.com',
                'phone' => '03349104560',
                'address' => 'gulbaharr',
                'city' => 'saddar bazar',
                'type' => '1',
                'password' => Hash::make('ilyaskhan11338'),
            ],
             
            ] );
    }
}
