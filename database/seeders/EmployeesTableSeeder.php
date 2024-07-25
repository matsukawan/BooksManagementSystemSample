<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            'emp_name' => '松川信之',
            'emp_id' => '1',
            'password' => '1234',
            'dep_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]); 

        DB::table('employees')->insert([
            'emp_name' => 'のぶお',
            'emp_id' => '2',
            'password' => '5678',
            'dep_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]); 

    }
}
