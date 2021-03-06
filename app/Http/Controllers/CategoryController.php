<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Role;
use App\Category;
class CategoryController extends Controller
{
    
    public function index()
    {
        $kategoris = Category::All();
        return view('kategori.index_kategori', compact('kategoris'));
    }

    public function edit($id)
    {
    	// Check Permissions
        $this->user = Auth::user()->role_id;
        $roles = Role::where('id', $this->user)->first();
        if($roles->edit_category == 0) abort(403);

    	$kategoris = Category::findOrFail($id);
        return view('kategori.edit_kategori', compact('kategoris'));
    }

    public function update($id, Request $request)
    {
    	// Check Permissions
        $this->user = Auth::user()->role_id;
        $roles = Role::where('id', $this->user)->first();
        if($roles->edit_category == 0) abort(403);

        $this->validate($request, [
            'name'          => 'required|min:3|max:150',
        ],[
            'name.required'=>'Nama Kategori harus diisi',
            'name.min'=>'Nama Kategori minimal 3 huruf',
            'name.max'=>'Nama Kategori maksimal 150 huruf',
        ]);
        Category::findOrFail($id)->update([
            'name'          => $request['name'],
        ]);

        return redirect('/kategori')->with('msg', 'Kategori berhasil diedit!');
    }
}
