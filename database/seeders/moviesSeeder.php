<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class moviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([
            'title' => 'Terminator',
            'genreId' => 2,
            'numberInStock' => 3,
            'dailyRentalRate' => 2.5,
            'liked' => false
        ]);
        DB::table('movies')->insert([
            'title' => 'Die Hard',
            'genreId' => 2,
            'numberInStock' => 5,
            'dailyRentalRate' => 3.5,
            'liked' => true
        ]);
        DB::table('movies')->insert([
            'title' => 'Get Out',
            'genreId' => 3,
            'numberInStock' => 2,
            'dailyRentalRate' => 4,
            'liked' => true
        ]);
        DB::table('movies')->insert([
            'title' => 'Trip to Italy',
            'genreId' => 1,
            'numberInStock' => 2,
            'dailyRentalRate' => 4.5,
            'liked' => true
        ]);
        DB::table('movies')->insert([
            'title' => 'Airplane',
            'genreId' => 1,
            'numberInStock' => 3,
            'dailyRentalRate' => 3,
            'liked' => false
        ]);
        DB::table('movies')->insert([
            'title' => 'Wedding Crashers',
            'genreId' => 1,
            'numberInStock' => 3,
            'dailyRentalRate' => 2,
            'liked' => false
        ]);
        DB::table('movies')->insert([
            'title' => 'Gone Girl',
            'genreId' => 3,
            'numberInStock' => 2,
            'dailyRentalRate' => 6,
            'liked' => true
        ]);
        DB::table('movies')->insert([
            'title' => 'The Sixth Sense',
            'genreId' => 3,
            'numberInStock' => 4,
            'dailyRentalRate' => 5.5,
            'liked' => false
        ]);
        DB::table('movies')->insert([
            'title' => 'The Avengers',
            'genreId' => 2,
            'numberInStock' => 6,
            'dailyRentalRate' => 5,
            'liked' => false
        ]);
    }
}
