<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $fillable = [
        'name', 'edit_category', 'add_content', 'edit_content', 'approve_content', 'edit_component', 'crud_permission', 'crud_user',
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}