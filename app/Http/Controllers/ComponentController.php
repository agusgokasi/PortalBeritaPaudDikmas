<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Role;
use App\Category;
use App\Component;
use App\User;

class ComponentController extends Controller
{

    public function index()
    {
        $components = Component::all();
        if (auth()->user()->role->edit_component == 1) {
            return view( 'components.index', compact('components') );
        }
        return abort(403);
    }

    public function show($id)
    {
        $component = Component::findOrFail($id);
        return view( 'component.single' );
    }

    public function edit($id)
    {
        $component = Component::findOrFail($id);
        if (auth()->user()->role->edit_component == 1) {
            return view( 'components.edit', compact('component') );
        }
        return abort(403);
    }

    public function update(Request $request, $id)
    {
        $component = Component::findOrFail($id);

        if (auth()->user()->role->edit_component == 1) {

            if ($component->is_navbar == 1 || $component->is_navbar_2 == 1) {

                $this->validate($request, [
                    'background_color'              => 'required',
                ],[
                    'background_color.required'=>'Kode Warna Harus Diisi',
                ]);


                $component->update([
                    'background_color'  => $request->background_color,
                ]);

                return back()->with('msg', 'Komponen berhasil diedit!');

            }elseif ($component->is_page == 1 || $component->is_page_link == 1) {


                    $this->validate($request, [
                        'name'              => 'required|min:3|max:150',
                        'content'            => 'required',
                    ],[
                        'name.required'=>'Nama Komponen harus diisi',
                        'name.min'=>'Nama Komponen minimal 3 huruf',
                        'name.max'=>'Nama Komponen maksimal 150 huruf',

                        'content.required'=>'Isi Komponen harus diisi',
                    ]);
                    
                    $component->update([
                        'content' => $request['content'],
                        'category_id' => 1,
                        'is_news' => 1,
                    ]);
                    $component->name = $request->name;
                    $component->url_detail = '/components/'.$component->id;
                    $component->save();

                    return back()->with('msg', 'Komponen berhasil diedit!');
            }

            return '';
        }
        return abort(403);
    }
}
