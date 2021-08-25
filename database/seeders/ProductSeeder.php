<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'title' => Str::random(10),
            'excerpt' => Str::random(10),
            'body' => Str::random(20),
            'price' => rand(5, 550),
            'category_id'=>rand(1, 10),
            'image_path'=>rand(1628757750,1655342636).'.png',
            
        ]);
        
    }
}
