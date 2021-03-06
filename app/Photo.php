<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

	protected $fillable = [
        'content_id', 'filename',
    ];

    public function content()
    {
        return $this->belongsTo('App\Content');
    }
}
