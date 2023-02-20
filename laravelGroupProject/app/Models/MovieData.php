<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieData extends Model
{
    use HasFactory;
    protected $fillable= [
        'title',
        'description',
        'genre',
        'actor',
        'characterName',
        'director',
        'releaseDate',
        'thumbnail',
        'background'
    ];
    protected $casts = [
        'genre' => 'array',
        'actor' => 'array',
        'characterName' => 'array'
    ];
}
