<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMoviesRequest;
use App\Services\MoviesService;

class MoviesController extends Controller
{
    public function index(MoviesService $service)
    {
        $movies = $service->list();

        return response($movies, 200);
    }

    public function add(StoreMoviesRequest $request, MoviesService $service)
    {
        $movie = $service->add($request);

        return response(
            $movie ? $movie : 'Failed in adding Movie',
            $movie ? 200 : 400
        );
    }

    public function update($id, StoreMoviesRequest $request, MoviesService $service)
    {
        $movie = $service->update($id, $request);
        $status = $movie ? 200 : 404;
        $response = $movie ? $movie : 'Movie not found';

        return response($response, $status);
    }

    public function delete($id, MoviesService $service)
    {
        $movie = $service->delete($id);
        $status = $movie ? 200 : 404;
        $response = $movie ? $movie : 'Movie not found';

        return response($response, $status);
    }

    public function get($id, MoviesService $service)
    {
        $movie = $service->get($id);
        $status = $movie ? 200 : 404;
        $response = $movie ? $movie : 'Movie not found';

        return response($response, $status);
    }

    public function setLike($id, MoviesService $service)
    {
        $movie = $service->setLike($id);
        $status = $movie ? 200 : 404;
        $response = $movie ? $movie : 'Movie not found';

        return response($response, $status);
    }
}
