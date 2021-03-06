<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Component;
use App\Photo;
use App\AppPadi;
use App\Pengumum;

class GuestController extends Controller
{

	public function index_news()
	{
		$components = Component::all();
        $contents = Content::orderBy('updated_at', 'desc')->where('is_news', 1)->where('status', 2)->paginate(4);
		return view('guest.index_news', compact('components', 'contents'));
	}

    public function show_news($id)
    {
    	$components = Component::all();
        $contents = Content::where('is_news', 1)->where('status', 2)->findOrFail($id);
        // dd($contents);
        return view('guest.show_news_guest', compact('components', 'contents') );
    }

    public function index_headline()
    {
    	$components = Component::all();
		return view('guest.index_headline', compact('components'));
    }

    public function show_headline($id)
    {
    	$components = Component::all();
        $contents = Content::where('is_headline', 1)->where('status', 2)->findOrFail($id);
        // dd($contents);
        return view('guest.show_headline_guest', compact('components', 'contents') );
    }

    public function index_gallery()
    {
    	$components = Component::all();
        $galleries = Content::orderBy('updated_at', 'desc')->where('is_gallery', 1)->where('status', 2)->paginate(6);
		return view('guest.index_gallery', compact('components', 'galleries'));
    }

    public function show_gallery($id)
    {
    	$components = Component::all();
        $contents = Content::where('is_gallery', 1)->where('status', 2)->findOrFail($id);
        $photos = Photo::where('content_id', $id)->paginate(12);
        // dd($contents);
        return view('guest.show_gallery', compact('components', 'contents', 'photos') );
    }


    public function show_page($id)
    {
    	$components = Component::all();
    	$component = Component::findOrFail($id);
		return view('guest.show_page', compact('components', 'component'));
    }

    public function show_page_link($id)
    {
    	$components = Component::all();
    	$component = Component::findOrFail($id);
		return view('guest.show_page_link', compact('components', 'component'));
    }

    public function index_app()
    {
        $components = Component::all();
        $padis = AppPadi::orderBy('updated_at', 'desc')->paginate(8);
        return view('guest.index_app', compact('components', 'padis'));
    }


    public function index_pengumuman()
    {
        $components = Component::all();
        $pengumumans = Pengumum::orderBy('updated_at', 'desc')->paginate(8);
        return view('guest.index_pengumuman', compact('components', 'pengumumans'));
    }

    public function show_pengumuman($id)
    {
        $components = Component::all();
        $pengumuman = Pengumum::findOrFail($id);
        // dd($contents);
        return view('guest.show_pengumuman', compact('components', 'pengumuman') );
    }



}
