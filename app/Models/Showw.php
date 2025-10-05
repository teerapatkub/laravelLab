<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Showw extends Model
{
    use SoftDeletes;

    protected $table = 'Showw';
    protected $primaryKey = 'show_id';
    public $incrementing = false;
    protected $keyType = 'string';

    // ชื่อคอลัมน์สำหรับ SoftDeletes
    const DELETED_AT = 'deleteat';

    protected $fillable = [
        'show_id',
        'movie_movie_id',
        'theater_theater_id',
        'show_language',
        'show_start_time',
        'hall_number'
    ];

    // ความสัมพันธ์กับโรงหนัง
    public function theater()
    {
        return $this->belongsTo(Theater::class, 'theater_theater_id', 'theater_id');
    }

    // ความสัมพันธ์กับหนัง
    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_movie_id', 'Movie_ID');
    }
}
