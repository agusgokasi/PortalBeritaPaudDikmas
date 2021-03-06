<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Role;
use DataTables;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user()->role_id;
            $roles = Role::where('id', $this->user)->first();
            if($roles->crud_user == 0) abort(403);
            return $next($request);
        });
    }

    public function get(Request $request){

        $data = User::with(['role'])->where('id', '!=' , '1')->get();
        
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'user._column_action')
                ->rawColumns(['action'])
                ->toJson();
    }

    public function index()
    {
        return view('user.index_user');
    }

    public function create()
    {
        $roles = Role::where('id', '!=' , '1')->get();
        return view('user.create_user', compact('roles'));
    }

    public function post(Request $request)
    {

        $this->validate($request, [
            'name'          => 'required|min:3|max:150',
            'email'         => 'required|string|unique:users|email|min:3|max:150',
            'role'          => 'required',
            'password'      => 'required|string|min:6|confirmed',
        ],[
            'name.required'=>'Nama User harus diisi',
            'name.min'=>'Nama User minimal 3 huruf',
            'name.max'=>'Nama User maksimal 150 huruf',

            'email.required'=>'Email harus diisi',
            'email.min'=>'Email minimal 3 huruf',
            'email.max'=>'Email maksimal 150 huruf',

            'role.required'=>'Permission harus diisi',

            'password.required'=>'password harus diisi',
            'password.min'=>'password maksimal 6 karakter',
            'password.confirmed'=>'konfirmasi password tidak sama',
        ]);
        User::create([
            'name'          => $request['name'],
            'email'         => $request['email'],
            'role_id'       => $request['role'],
            'password'      => Hash::make($request['password']),
        ]);

        return redirect('/user')->with('msg', 'User berhasil dibuat!');
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        $roles = Role::where('id', '!=' , '1')->get();
        return view('user.edit_user', compact('users', 'roles'));
    }

    public function update($id, Request $request)
    {

        $this_user = User::where('id', $id)->first();

        if ($this_user->email == $request['email']) {
            $this->validate($request, [
                'name'          => 'required|min:3|max:150',
                'email'         => 'required|string|email|min:3|max:150',
                'role'          => 'required',
            ],[
                'name.required'=>'Nama User harus diisi',
                'name.min'=>'Nama User minimal 3 huruf',
                'name.max'=>'Nama User maksimal 150 huruf',
                'email.required'=>'Email harus diisi',
                'email.min'=>'Email minimal 3 huruf',
                'email.max'=>'Email maksimal 150 huruf',

                'role.required'=>'Permission harus diisi',
            ]);
        }else{
            $this->validate($request, [
                'name'          => 'required|min:3|max:150',
                'email'         => 'required|string|unique:users|email|min:3|max:150',
                'role'          => 'required',
            ],[
                'name.required'=>'Nama User harus diisi',
                'name.min'=>'Nama User minimal 3 huruf',
                'name.max'=>'Nama User maksimal 150 huruf',
                'email.required'=>'Email harus diisi',
                'email.unique'=>'Email Sudah ada',
                'email.min'=>'Email minimal 3 huruf',
                'email.max'=>'Email maksimal 150 huruf',

                'role.required'=>'Permission harus diisi',
            ]);
        }

        
        User::findOrFail($id)->update([
            'name'          => $request['name'],
            'email'         => $request['email'],
            'role_id'       => $request['role'],
        ]);

        return redirect('/user')->with('msg', 'User berhasil diedit!');
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);
        if ($users) {
            if ($users->id == 1) {
                return abort(403);
            }else{
                $users->delete();
            }

        }
        else{
            return abort(404);
        }
        return back()->with('msg', 'User berhasil dihapus!');
   }


}
