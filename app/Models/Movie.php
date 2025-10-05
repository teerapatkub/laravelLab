<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use SoftDeletes;

    protected $table = 'Movie';
    protected $primaryKey = 'Movie_ID';
    public $incrementing = false;
    protected $keyType = 'string';

    const DELETED_AT = 'deleteAT';

    protected $fillable = [
        'Movie_ID',
        'Movie_NAME',
        'Movie_ACTORS',
        'Movie_DIRECTOR',
        'Movie_TIME',
        'Movie_img',
        'Movie_video'
    ];

    // ความสัมพันธ์กับรอบหนัง
    public function showtimes()
    {
        return $this->hasMany(Showw::class, 'movie_movie_id', 'Movie_ID');
    }
}
