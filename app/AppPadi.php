<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppPadi extends Model
{
    protected $fillable = [
        'name', 'icon', 'link'
    ];
}
