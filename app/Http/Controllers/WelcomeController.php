<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Component;
use App\Color;
use App\Pengumum;

class WelcomeController extends Controller
{
    public function welcome()
    {
    	$components = Component::all();
        $contents = Content::orderBy('updated_at', 'desc')->where('is_news', 1)->where('status', 2)->take(6)->get();

        $galleries = Content::orderBy('updated_at', 'desc')->where('is_gallery', 1)->where('status', 2)->take(4)->get();

        $headlines = Content::orderBy('updated_at', 'desc')->where('is_headline', 1)->where('status', 2)->take(5)->get();

        $pengumumans = Pengumum::orderBy('updated_at', 'desc')->first();

        return view('welcome', compact('components', 'contents', 'galleries', 'headlines', 'pengumumans') );
    }

    public function visi_misi()
    {
    	$components = Component::all();
        return view('visi_misi.visi_misi', compact('components') );
    }


    public function tugas_fungsi()
    {
    	$components = Component::all();
        return view('tugas_fungsi.tugas_fungsi', compact('components') );
    }

    public function struktur_organisasi()
    {
    	$components = Component::all();
        return view('struktur_organisasi.struktur_organisasi', compact('components') );
    }

    public function reformasi_birokrasi()
    {
    	$components = Component::all();
        return view('reformasi_birokrasi.reformasi_birokrasi', compact('components') );
    }

    public function _vertikal()
    {
        $components = Component::all();
        return view('vertikal._vertikal', compact('components') );
    }
    public function _unduh()
    {
        $components = Component::all();
        return view('unduh._unduh', compact('components') );
    }


}
