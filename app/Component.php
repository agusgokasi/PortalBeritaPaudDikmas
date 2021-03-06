<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
   protected $fillable = [
        'url_detail', 'content', 'background_color'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
