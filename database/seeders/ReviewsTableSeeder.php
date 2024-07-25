<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            'emp_id' => 1,
            'rating' => 5,
            'comment' => '最高',
            'book_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]); 

        DB::table('reviews')->insert([
            'emp_id' => 2,
            'rating' => 4,
            'comment' => '控えめに言って最高',
            'book_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]); 

        DB::table('reviews')->insert([
            'emp_id' => 3,
            'rating' => 5,
            'comment' => '言わずもがな最高',
            'book_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]); 
    }
}
