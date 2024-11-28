<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
            'id' => '888',
            'name' => 'olele',
            'email' => 'olele@gmail.com',
            'password' => '888',
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);
    }
}
