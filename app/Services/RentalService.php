<?php

namespace App\Services;

use App\Models\Rentals;


class RentalService
{
    public function list()
    {
        $rentals = Rentals::with('user')
            ->with('movie')
            ->get();
        return $rentals;
    }

    public function insert($data)
    {
        $rental = Rentals::create([
            'userId' => $data->userId,
            'movieId' => $data->movieId,
            'rentalDays' => $data->rentalDays,
            'returned' => (int) $data->returned,
        ]);

        return $rental ?? false;
    }

    public function update($id, $data)
    {
        $rental = Rentals::find($id);
        if (!$rental) {
            return false;
        }

        $rental->update([
            'userId' => $data->userId,
            'movieId' => $data->movieId,
            'rentalDays' => $data->rentalDays,
            'returned' => (int) $data->returned,
        ]);

        return $rental ?? false;
    }

    public function disableEnable($id)
    {
        $rental = Rentals::find($id);
        if (!$rental) {
            return false;
        }

        $rental->update([
            'returned' => !$rental->returned
        ]);

        return $rental;
    }

    public function get($id)
    {
        $rental = Rentals::where('id', $id)->first();
        return $rental;
    }
}
