<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\Genres;

class GenresService extends Controller
{
    public function list()
    {
        $movies = Genres::get();
        return $movies;
    }

    public function add()
    {
        $genre = Genres::create([
            'name' => 'this is the way',
        ]);

        return $genre;
    }

    public function update($id)
    {
        $genre = Genres::find($id)->update([
            'name' => 'this is the way',
        ]);

        return $genre;
    }

    public function delete($id)
    {
        $genre = Genres::find($id)->delete();
        return $id;
    }

    public function get($id)
    {
        $genre = Genres::find($id);
        return $genre;
    }
}
