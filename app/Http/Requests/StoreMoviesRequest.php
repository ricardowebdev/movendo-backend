<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMoviesRequest extends FormRequest
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
            'title' => 'required|string',
            'genreId' => 'required|numeric',
            'numberInStock' => 'required|numeric|min:1|max:10',
            'dailyRentalRate' => 'required|numeric|min:1|max:10',
            'like' => 'boolean'
        ];
    }
}
