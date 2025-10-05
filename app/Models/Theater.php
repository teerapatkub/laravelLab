<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theater extends Model
{
    protected $table = 'Theater';
    protected $primaryKey = 'theater_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'theater_id',
        'theater_name',
        'theater_location',
        'create_at',
        'update_at'
    ];

    public function showtimes()
    {
        return $this->hasMany(Showw::class, 'theater_theater_id', 'theater_id');
    }
}
