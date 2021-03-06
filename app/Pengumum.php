<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumum extends Model
{
    protected $fillable = [
        'name', 'banner', 'content', 'detail'
    ];
}
