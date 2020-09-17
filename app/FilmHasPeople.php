<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmHasPeople extends Model
{
    protected $table = 'films_has_peoples';

    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'films_id',
        'peoples_id',

    ];


}
