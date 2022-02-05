<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRentalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'userId'      => 'required|numeric',
            'movieId'     => 'required|numeric',
            'rentalDays'  => 'required|numeric|min:1|max:10',
            'returned'    => 'required|boolean'
        ];
    }
}
