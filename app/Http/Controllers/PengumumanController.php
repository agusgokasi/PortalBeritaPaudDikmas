<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengumum;
use Image;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role->edit_component == 1) {
            $pengumumans = Pengumum::orderBy('updated_at', 'desc')->paginate(20);
            return view('pengumuman.index', compact('pengumumans'));
        }
        return abort(403);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->role->edit_component == 1) {
            return view('pengumuman.create');
        }
        return abort(403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->role->edit_component == 1) {

            // $content = Content::findOrFail($id);
            // dd($content->id);

            $this->validate($request, [
                'name' => 'required|min:3|max:150',
                'banner' => 'mimes:jpeg,png,jpg,svg|dimensions:width=200,height=100',
                'content' => 'required|min:3|max:150',
                'detail' => 'required',
            ],[

                'name.required'=>'Nama Aplikasi Harus diisi',
                'name.min'=>'Nama Aplikasi minimal 3 huruf',
                'name.max'=>'Nama Aplikasi maksimal 150 huruf',

                'content.required'=>'Isi Pengumuman Harus diisi',
                'content.min'=>'Isi Pengumuman minimal 3 huruf',
                'content.max'=>'Isi Pengumuman maksimal 150 huruf',

                'detail.required'=>'Detail Pengumuman Harus diisi',

                'banner.mimes'=>'Banner berformat .jpg,png,jpeg,svg',
                'banner.dimensions'=>'Resolusi banner tidak sesuai, gunakanlah resolusi 200x100',
            ]);

            $file = $request->file('banner');

            if ($file != null) {
                $filename = time().rand(1000,9999).'.'.$file->getClientOriginalExtension();
                $path = public_path('/banner/pengumuman');
                $headline = Image::make($file->getRealPath())->save($path.'/'.$filename, 100 );
            }

            $pengumum = Pengumum::create([
                    'name' => $request->name,
                    'content' => $request->content,
                    'detail' => $request->detail,
                ]);

            if ($file!=null) {
                $pengumum->banner = $filename;
                $pengumum->save();
            }

            return redirect('pengumum')->with('msg', '1 Pengumuman berhasil di submit!');

        }
        return abort(403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->role->edit_component == 1) {
            $pengumuman = Pengumum::findOrFail($id);
            return view('pengumuman.edit', compact('pengumuman'));
        }
        return abort(403);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->role->edit_component == 1) {

            // $content = Content::findOrFail($id);
            // dd($content->id);

            $this->validate($request, [
                'name' => 'required|min:3|max:150',
                'banner' => 'mimes:jpeg,png,jpg,svg|dimensions:width=200,height=100',
                'content' => 'required|min:3|max:150',
                'detail' => 'required',
            ],[

                'name.required'=>'Nama Aplikasi Harus diisi',
                'name.min'=>'Nama Aplikasi minimal 3 huruf',
                'name.max'=>'Nama Aplikasi maksimal 150 huruf',

                'content.required'=>'Isi Pengumuman Harus diisi',
                'content.min'=>'Isi Pengumuman minimal 3 huruf',
                'content.max'=>'Isi Pengumuman maksimal 150 huruf',

                'detail.required'=>'Detail Pengumuman Harus diisi',

                'banner.required'=>'Banner wajib diisi',
                'banner.mimes'=>'Banner berformat .jpg,png,jpeg,svg',
                'banner.dimensions'=>'Resolusi banner tidak sesuai, gunakanlah resolusi 200x100',
            ]);
            $pengumuman = Pengumum::findOrFail($id);

            $pengumuman->update([
                    'name' => $request->name,
                    'content' => $request->content,
                    'detail' => $request->detail,
                ]);

            $file = $request->file('banner');
            if ($file != null) {
                $filename = time().rand(1000,9999).'.'.$file->getClientOriginalExtension();
                $path = public_path('/banner/pengumuman');
                $headline = Image::make($file->getRealPath())->save($path.'/'.$filename, 100 );
                $pengumuman->banner = $filename;
            }
            

            return redirect('pengumum')->with('msg', '1 pengumuman berhasil di edit!');

        }
        return abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->role->edit_component == 1) {

            $pengumuman = Pengumum::findOrFail($id);
            $pengumuman->delete();

            return back()->with('msg', '1 aplikasi berhasil dihapus!');
        }

        return abort(403);
    }
}
