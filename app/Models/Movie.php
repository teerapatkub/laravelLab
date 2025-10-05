<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use SoftDeletes;

    protected $table = 'Movie'; // ชื่อตารางตรงกับ MySQL
    protected $primaryKey = 'Movie_ID';
    public $incrementing = false;
    protected $keyType = 'string';

    // บอก Laravel ใช้คอลัมน์ deleteAT แทน deleted_at
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
}
