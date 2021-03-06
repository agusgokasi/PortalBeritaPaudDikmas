<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	protected $fillable = [
        'name', 'is_content', 'is_component ',
    ];

    public function contents()
    {
        return $this->hasMany('App\Content');
    }

    public function components()
    {
        return $this->hasMany('App\Component');
    }
}
