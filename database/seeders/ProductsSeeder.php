<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
            'id' => '888',
            'image' => 'olala',
            'title' => 'olili',
            'description' => 'ogaga',
            'price' => '123',
            'stock' => '123',
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);
    }
}
