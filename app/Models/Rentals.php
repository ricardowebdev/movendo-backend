<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Movies;

class Rentals extends Model
{
    use HasFactory;
    protected $table = 'rentals';
    protected $primaryKey = 'id';

    protected $hidden = [
        'updated_at'
    ];

    protected $fillable = [
        'userId',
        'movieId',
        'rentalDays',
        'returned'
    ];

    protected $casts = [
        'created_at' => 'datetime:m/d',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'userId');
    }

    public function movie()
    {
        return $this->hasOne(Movies::class, 'id', 'movieId');
    }
}
