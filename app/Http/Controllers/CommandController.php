<?php

namespace App\Http\Controllers;
use Artisan;
use Illuminate\Http\Request;

class CommandController extends Controller
{
    public function bersihincache()
    {
    	Artisan::call('config:cache');
    	Artisan::call('config:clear');
    	Artisan::call('cache:clear');
    	Artisan::call('route:cache');
    	echo 'berhasil bersihin cache';
    }
}
