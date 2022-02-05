<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\GenresService;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    public function index(GenresService $service)
    {
        $movies = $service->list();
        return response($movies, 200);
    }

    public function insert(Request $request, GenresService $service)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $movies = $service->add();
        return response($movies, 200);
    }

    public function update($id, Request $request, GenresService $service)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $genre = $service->update($id);
        $status = $genre ? 200 : 404;
        return response($genre, $status);
    }

    public function delete($id, GenresService $service)
    {
        $genre = $service->delete($id);
        $status = $genre ? 200 : 404;
        return response($genre, $status);
    }

    public function get($id, GenresService $service)
    {
        $movies = $service->get($id);
        return response($movies, 200);
    }
}
