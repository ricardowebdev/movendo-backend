<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRentalRequest;
use App\Services\RentalService;

class RentalController extends Controller
{
    public function insert(StoreRentalRequest $request, RentalService $service)
    {
        $rental = $service->insert($request);

        return response(
            $rental ? $rental : 'Failed in adding Rental',
            $rental ? 200 : 400
        );
    }

    public function update($id, StoreRentalRequest $request, RentalService $service)
    {
        $rental = $service->update($id, $request);

        return response(
            $rental ? $rental : 'Failed in updating Rental',
            $rental ? 200 : 400
        );
    }

    public function list(RentalService $service)
    {
        $rentals = $service->list();

        return response(
            $rentals ? $rentals : 'Failed in listing Rentals',
            $rentals ? 200 : 400
        );
    }

    public function disableEnable($id, StoreRentalRequest $service)
    {
        $rental = $service->disableEnable($id);

        return response(
            $rental ? $rental : 'Operation failed',
            $rental ? 200 : 400
        );
    }

    public function get($id, RentalService $service)
    {
        $rental = $service->get($id);
        $status = $rental ? 200 : 404;
        $response = $rental ? $rental : 'Rental not found';

        return response($response, $status);
    }
}
