<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            'book_name' => '熊 他三篇',
            'author' => 'W・フォークナー',
            'publisher' => '岩波文庫',
            'price' => 780,
            'isbn' => 9784003232330,
            'num_of_books' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('books')->insert([
            'book_name' => 'サンクチュアリ',
            'author' => 'W・フォークナー',
            'publisher' => '新潮文庫',
            'price' => 630,
            'isbn' => 9784102102022,
            'num_of_books' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('books')->insert([
            'book_name' => 'フォークナー短編集',
            'author' => 'W・フォークナー',
            'publisher' => '新潮文庫',
            'price' => 550,
            'isbn' => 9784102102039,
            'num_of_books' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
