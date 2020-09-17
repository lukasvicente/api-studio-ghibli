<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table = 'peoples';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'gender',
        'age',
        'eye_color',
        'hair_color',

    ];

    public $timestamps = true;

    public function film()
    {
        return $this->belongsToMany(Film::class, 'films_has_peoples', 'peoples_id', 'films_id');
    }
}
