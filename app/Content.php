<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'category_id', 'is_news', 'is_headline', 'is_gallery', 'title', 'description', 'news_date', 'content', 'banner', 'status', 'created_by', 'updated_by ',
    ];


    public static function boot()
    {
        parent::boot();
        // Update field update_by with current user id each time content is updated.
        static::updating(function ($content) {
            $content->updated_by = auth()->user()->id;
        });
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    public function create_user()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function update_user()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }
}
