<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class genresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            'name' => 'Comedy',
        ]);

        DB::table('genres')->insert([
            'name' => 'Action',
        ]);

        DB::table('genres')->insert([
            'name' => 'Thriller',
        ]);
    }
}
