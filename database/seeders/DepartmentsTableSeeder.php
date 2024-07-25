<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            'dep_name' => '総務課',
            'created_at' => now(),
            'updated_at' => now()
        ]); 

        DB::table('departments')->insert([
            'dep_name' => '業務課',
            'created_at' => now(),
            'updated_at' => now()
        ]); 
    }
}
