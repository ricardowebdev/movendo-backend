<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genres;

class Movies extends Model
{
    use HasFactory;
    protected $table = 'movies';
    protected $primaryKey = 'id';

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'title',
        'genreId',
        'numberInStock',
        'dailyRentalRate',
        'liked'
    ];

    public function genre()
    {
        return $this->hasOne(Genres::class, 'id', 'genreId');
    }
}
