<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pet_categories')->insert(['name' => 'reptile', 'is_common' => false]);
        DB::table('pet_categories')->insert(['name' => 'bird', 'is_common' => false]);
        DB::table('pet_categories')->insert(['name' => 'cat', 'is_common' => true]);
        DB::table('pet_categories')->insert(['name' => 'dog', 'is_common' => true]);
        DB::table('pet_categories')->insert(['name' => 'fish', 'is_common' => true]);
        DB::table('pet_categories')->insert(['name' => 'hamster', 'is_common' => false]);
        DB::table('pet_categories')->insert(['name' => 'horse', 'is_common' => false]);
        DB::table('pet_categories')->insert(['name' => 'rabbit', 'is_common' => false]);
        DB::table('pet_categories')->insert(['name' => 'rat', 'is_common' => false]);
        DB::table('pet_categories')->insert(['name' => 'small_animal', 'is_common' => false]);
        DB::table('pet_categories')->insert(['name' => 'other', 'is_common' => false]);
    }
}
