<?php

namespace App\Services;

use App\Models\Movies;

class MoviesService
{
    public function list()
    {
        $movies = Movies::with('genre')->get();
        return $movies;
    }

    public function add($data)
    {
        $movie = Movies::create([
            'title'           => $data->title,
            'genreId'         => $data->genreId,
            'numberInStock'   => $data->numberInStock,
            'dailyRentalRate' => $data->dailyRentalRate,
            'liked'           => false
        ]);

        return $movie;
    }

    public function update($id, $data)
    {
        $movie = Movies::find($id);

        if ($movie) {
            $movie->update([
                'title'           => $data->title,
                'genreId'         => $data->genreId,
                'numberInStock'   => $data->numberInStock,
                'dailyRentalRate' => $data->dailyRentalRate,
                'liked'           => isset($data->liked) ? (int) $data->liked : (int) $movie->liked
            ]);
        }

        return $movie ?? [];
    }

    public function delete($id)
    {
        $result = 0;

        $movie = Movies::find($id);
        if ($movie) {
            $result = $movie->delete() ? $id : false;
        }

        return $result;
    }

    public function get($id)
    {
        $movie = Movies::with(['genre'])->where('id', $id)->get();
        return $movie;
    }

    public function setLike($id)
    {
        $movie = Movies::find($id);
        if ($movie) {
            $movie->update([
                'liked' => (int) !$movie->liked
            ]);
        }

        return $movie ?? false;
    }
}
