<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Role;

class RoleController extends Controller
{
    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user()->role_id;
            $roles = Role::where('id', $this->user)->first();
            if($roles->crud_permission == 0) abort(403);
            return $next($request);
        });
    }

    public function index()
    {
        $users = User::where('id', '!=' , '1')->get();
        $roles = Role::where('id', '!=' , '1')->get();
        return view('permission.index_permission', compact('users', 'roles'));
    }

    public function create()
    {
        return view('permission.create_permission');
    }

    public function post(Request $request)
    {

        $this->validate($request, [
            'name'              => 'required|min:3|max:150',
            'add_content'       => 'required|in:1,0',
            'edit_content'      => 'required|in:1,0',
            'edit_category'      => 'required|in:1,0',
            'edit_component'      => 'required|in:1,0',
            'approve_content'   => 'required|in:1,0',
            'crud_permission'   => 'required|in:1,0',
            'crud_user'         => 'required|in:1,0',
        ],[
            'name.required'=>'Nama Permission harus diisi',
            'name.min'=>'Nama Permission minimal 3 huruf',
            'name.max'=>'Nama Permission maksimal 150 huruf',
            'edit_category.required'=>'Edit Kategori harus diisi',
            'add_content.required'=>'Tambah Konten harus diisi',
            'edit_content.required'=>'Edit Konten harus diisi',
            'edit_component.required'=>'Edit Kompenen harus diisi',
            'approve_content.required'=>'Approve Konten harus diisi',
            'crud_permission.required'=>'CRUD Permission harus diisi',
            'crud_user.required'=>'CRUD User harus diisi',
        ]);

        Role::create([
            'name'                  => $request['name'],
            'add_content'           => $request['add_content'],
            'edit_content'          => $request['edit_content'],
            'edit_category'         => $request['edit_category'],
            'edit_component'        => $request['edit_component'],
            'approve_content'       => $request['approve_content'],
            'crud_permission'       => $request['crud_permission'],
            'crud_user'             => $request['crud_user'],
        ]);

        return redirect('permission')->with('msg', 'Permission berhasil dibuat!');
    }

    public function edit($id)
    {
        $roles = Role::findOrFail($id);
        return view('permission.edit_permission', compact('roles'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name'              => 'required|min:3|max:150',
            'add_content'       => 'required|in:1,0',
            'edit_content'      => 'required|in:1,0',
            'edit_category'      => 'required|in:1,0',
            'edit_component'      => 'required|in:1,0',
            'approve_content'   => 'required|in:1,0',
            'crud_permission'   => 'required|in:1,0',
            'crud_user'         => 'required|in:1,0',
        ],[
            'name.required'=>'Nama Permission harus diisi',
            'name.min'=>'Nama Permission minimal 3 huruf',
            'name.max'=>'Nama Permission maksimal 150 huruf',

            'add_content.required'=>'Tambah Konten harus diisi',
            'edit_content.required'=>'Edit Konten harus diisi',
            'edit_category.required'=>'Edit Kategori harus diisi',
            'edit_component.required'=>'Edit Kompenen harus diisi',
            'approve_content.required'=>'Approve Konten harus diisi',
            'crud_permission.required'=>'CRUD Permission harus diisi',
            'crud_user.required'=>'CRUD User harus diisi',
        ]);

        Role::findOrFail($id)->update([
            'name'                  => $request['name'],
            'add_content'           => $request['add_content'],
            'edit_content'          => $request['edit_content'],
            'edit_category'         => $request['edit_category'],
            'read_component'        => $request['read_component'],
            'edit_component'        => $request['edit_component'],
            'approve_content'       => $request['approve_content'],
            'crud_permission'       => $request['crud_permission'],
            'crud_user'             => $request['crud_user'],
        ]);

        return redirect('permission')->with('msg', 'Permission berhasil diedit!');
    }

    public function destroy($id)
    {
        $roles = Role::findOrFail($id);
        if ($roles->id == 1 || $roles->id == 2 || $roles->id == 3 || $roles->id == 4) {
            return abort(403);
        }else{
            $roles->delete();
            return redirect('permission')->with('msg', 'Permission berhasil dihapus!');
        }
   }


}
