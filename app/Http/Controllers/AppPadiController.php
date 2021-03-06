<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppPadi;
use Image;

class AppPadiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role->edit_component == 1) {
            $app_padis = AppPadi::orderBy('updated_at', 'desc')->paginate(20);
            return view('app_padi.index', compact('app_padis'));
        }
        return abort(403);
    }

    public function create()
    {
        return abort(404);
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
                'icon' => 'required|mimes:jpeg,png,jpg,svg|dimensions:width=200,height=100',
                'link' => 'required|min:3',
            ],[

                'name.required'=>'Nama Aplikasi Harus diisi',
                'name.min'=>'Nama Aplikasi minimal 3 huruf',
                'name.max'=>'Nama Aplikasi maksimal 150 huruf',

                'link.required'=>'URL Aplikasi Harus diisi',
                'link.min'=>'URL Aplikasi minimal 3 huruf',

                'icon.required'=>'Photo wajib diisi',
                'icon.mimes'=>'Photo berformat .jpg,png,jpeg,svg',
                'icon.dimensions'=>'Resolusi icon tidak sesuai, gunakanlah resolusi 200x100',
            ]);

            $file = $request->file('icon');
            $filename = time().rand(1000,9999).'.'.$file->getClientOriginalExtension();
            $path = public_path('/banner/app_padi');
            $headline = Image::make($file->getRealPath())->save($path.'/'.$filename, 100 );

            AppPadi::create([
                    'name' => $request->name,
                    'icon' => $filename,
                    'link' => $request->link,
                ]);

            return back()->with('msg', '1 Aplikasi berhasil di submit!');

        }
        return abort(403);
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(404);
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
                'icon' => 'mimes:jpeg,png,jpg,svg|dimensions:width=200,height=100',
                'link' => 'required|min:3',
            ],[

                'name.required'=>'Nama Aplikasi Harus diisi',
                'name.min'=>'Nama Aplikasi minimal 3 huruf',
                'name.max'=>'Nama Aplikasi maksimal 150 huruf',

                'link.required'=>'URL Aplikasi Harus diisi',
                'link.min'=>'URL Aplikasi minimal 3 huruf',

                'icon.required'=>'Photo wajib diisi',
                'icon.mimes'=>'Photo berformat .jpg,png,jpeg,svg',
                'icon.dimensions'=>'Resolusi icon tidak sesuai, gunakanlah resolusi 200x100',
            ]);
            $padi = AppPadi::findOrFail($id);

            $padi->update([
                    'name' => $request->name,
                    'link' => $request->link,
                ]);

            $file = $request->file('icon');
            if ($file != null) {
                $filename = time().rand(1000,9999).'.'.$file->getClientOriginalExtension();
                $path = public_path('/banner/app_padi');
                $headline = Image::make($file->getRealPath())->save($path.'/'.$filename, 100 );
                $padi->banner = $filename;
            }
            

            return back()->with('msg', '1 Aplikasi berhasil di edit!');

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

            $app_padi = AppPadi::findOrFail($id);
            $app_padi->delete();

            return back()->with('msg', '1 aplikasi berhasil dihapus!');
        }

        return abort(403);
    }
}
