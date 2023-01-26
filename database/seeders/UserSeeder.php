<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $us = 
        [
            [
                'name' => "Valen",
                'email' => "valen@gmail.com",
                'password' => Hash::make('valen123rpl'),
                "created_at"=> now()
            ],
        ];

        DB::table('users')->insert($us);
    }
}
