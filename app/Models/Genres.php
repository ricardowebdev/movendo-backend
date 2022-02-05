<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movies;

class Genres extends Model
{
    protected $table = 'genres';
    protected $primaryKey = 'id';

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'name',
    ];

    use HasFactory;

    public function movies()
    {
        return $this->belongsTo(Movies::class, 'id', 'genreId');
    }
}
