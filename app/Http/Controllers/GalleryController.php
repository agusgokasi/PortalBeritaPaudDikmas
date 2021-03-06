<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\Role;
use App\Category;
use App\Content;
use App\Photo;
use App\User;
use DataTables;
use App\Notifications\SubmitGallery;
use App\Notifications\ApproveGallery;
use App\Notifications\RejectGallery;

class GalleryController extends Controller
{
    // gallery create
    public function Create()
    {
        if (auth()->user()->role->add_content == 1) {
            return view('konten.gallery.create_gallery');
        }
        
        return abort(403);
    }

    // post gallery
    public function post(Request $request)
    {   

        if (auth()->user()->role->add_content == 1) {
            $this->validate($request, [
                'title'              => 'required|min:3|max:150',
                'banner'             => 'required|mimes:jpeg,png,jpg,svg|max:10000',
                'description'        => 'required|min:3|max:200',
            ],[
                'title.required'=>'Judul gallery harus diisi',
                'title.min'=>'Judul gallery minimal 3 huruf',
                'title.max'=>'Judul gallery maksimal 150 huruf',

                'banner.required'=>'Thumbnail Photo wajib diisi',
                'banner.mimes'=>'Thumbnail Photo berformat .jpg,png,jpeg,svg',
                'banner.max'=>'Thumbnail Photo maksimal 10Mb',

                'description.required'=>'Deskripsi harus diisi',
                'description.min'=>'Deskripsi minimal 3 huruf',
                'description.max'=>'Deskripsi maksimal 200 huruf',
            ]);

            $file = $request->file('banner');
            $filename = time().rand(1000,9999).'.'.$file->getClientOriginalExtension();
            $path = public_path('/banner/t_gallery');
            $t_gallery = Image::make($file->getRealPath())->resize(300, 200)->save($path.'/'.$filename, 100 );

            $created_by = auth()->user()->id;

            $content = Content::create([
                    'title'  => $request['title'],
                    'banner' => $filename,
                    'description' => $request['description'],
                    'category_id' => 1,
                    'status' => 0,
                    'is_gallery' => 1,
                    'created_by' => $created_by,
                ]);

            return redirect('gallery')->with('msg', 'Gallery berhasil dibuat!');
        }

        return abort(403);
    }

    public function index()
    {
        
        $users = User::all();

        if (auth()->user()->role->approve_content == 1) {
            foreach ($users as $user) {
                $user->unreadNotifications->where('type', 'App\Notifications\SubmitGallery')->markAsRead();
            }
        }

        if ( auth()->user()->role->add_content == 1) {
            auth()->user()->unreadNotifications->where('type', 'App\Notifications\RejectGallery')->markAsRead();
        }

        return view('konten.index_konten');
    }

    public function apiGallery(Request $request)
    {

        $data = Content::where('is_gallery', 1)->where('status', '!=', '2')->orderBy('updated_at', 'desc')->get();

        if (auth()->user()->role->approve_content == 0) {
            $data = $data->where('created_by', auth()->user()->id); // content yg user buat
        }elseif (auth()->user()->role->approve_content == 1) {
            $data = $data->where('status', 1); //content yg ingin di approve
        }

        return Datatables::of($data)
                ->addIndexColumn()

                ->editColumn('created_by', function ($model) {
                    return $model->create_user->name;
                })

                ->editColumn('updated_by', function ($model) {

                    if ($model->updated_by == null) {
                        return '-';
                    }else{
                        return $model->update_user->name;
                    }
                })

                ->editColumn('created_at', function ($model) {
                    return $model->created_at ? with($model->created_at)->format('D, d-m-Y H:i:s') : '';
                })
                ->editColumn('updated_at', function ($model) {
                    return $model->updated_at ? with($model->updated_at)->format('D, d-m-Y H:i:s') : '';
                })

                ->editColumn('status', function ($model) {

                    if ($model->status == 0) {
                        return '<span class="bg-secondary text-light rounded" style="padding: 5px">Pending</span>';
                    }elseif ($model->status == 1) {
                        return '<span class="bg-primary text-light rounded" style="padding: 5px">Submited</span>';
                    }elseif ($model->status == 2) {
                        return '<span class="bg-success text-light rounded" style="padding: 5px">Approved</span>';
                    }elseif ($model->status == 9) {
                        return '<span class="bg-danger text-light rounded" style="padding: 5px">Rejected</span>';
                    }
                    else {
                        return '-';
                    }
                })

                ->addColumn('detail', 'konten.gallery._btn_detail')

                ->addColumn('action', 'konten.gallery._btn_action')

                ->rawColumns(['detail', 'action', 'status'])
                ->toJson();
    }

    public function show($id)
    {
        $content = Content::where('is_gallery', 1)->findOrFail($id);
        $photos = Photo::where('content_id', $content->id)->get();
        return view('konten.gallery.show_gallery', compact('content', 'photos') );
    }

    public function photoPost(Request $request, $id)
    {
        if (auth()->user()->role->add_content == 1) {

            $content = Content::findOrFail($id);

            $this->validate($request, [
                'filename'             => 'required|mimes:jpeg,png,jpg,svg|max:10000',
            ],[

                'filename.required'=>'Photo wajib diisi',
                'filename.mimes'=>'Photo berformat .jpg,png,jpeg,svg',
                'filename.max'=>'Photo maksimal 10Mb',
            ]);

            $file = $request->file('filename');
            $filename = time().rand(1000,9999).'.'.$file->getClientOriginalExtension();
            $path = public_path('/banner/gallery');
            $headline = Image::make($file->getRealPath())->save($path.'/'.$filename, 100 );

            $photos = Photo::create([
                    'content_id' => $content->id,
                    'filename' => $filename,
                ]);

            return back()->with('msg', '1 Foto berhasil di submit!');
        }

        return abort(403);
    }

    public function photoDestroy($id)
    {
        // Check Permissions
        $this->user = Auth::user()->role_id;
        $roles = Role::where('id', $this->user)->first();
        if($roles->edit_content == 0) abort(403);

        $photos = Photo::findOrFail($id);
        $photos->delete();
        
        return back()->with('msg', 'Foto berhasil dihapus!');
    }

    public function edit($id)
    {
    	if (auth()->user()->role->edit_content == 1) {
    		$content = Content::findOrFail($id);

            return view('konten.gallery.edit_gallery', compact('content') );
        }
        
        return abort(403);
    }

    // post gallery
    public function update(Request $request, $id)
    {   

        if (auth()->user()->role->edit_content == 1) {

        	$content = Content::findOrFail($id);

            $this->validate($request, [
                'title'              => 'required|min:3|max:150',
                'banner'             => 'mimes:jpeg,png,jpg,svg|max:10000',
                'description'        => 'required|min:3|max:200',
            ],[
                'title.required'=>'Judul gallery harus diisi',
                'title.min'=>'Judul gallery minimal 3 huruf',
                'title.max'=>'Judul gallery maksimal 150 huruf',

                'description.required'=>'Deskripsi harus diisi',
                'description.min'=>'Deskripsi minimal 3 huruf',
                'description.max'=>'Deskripsi maksimal 200 huruf',
            ]);

            $content->update([
                'title'  => $request['title'],
                'description' => $request['description'],
                'category_id' => 1,
                'is_gallery' => 1,
            ]);

            if ($request->banner != null) {
                $file = $request->file('banner');
                $filename = time().rand(1000,9999).'.'.$file->getClientOriginalExtension();
                $path = public_path('/banner/t_gallery');
                $t_gallery = Image::make($file->getRealPath())->resize(300, 200)->save($path.'/'.$filename, 100 );

                $content->banner = $filename;
            }

            $content->updated_by = auth()->user()->id;
            $content->save();
            if($content->status == 0){
                return redirect('gallery')->with('msg', 'Gallery berhasil diedit!');
            }elseif($content->status == 1){
                return redirect('gallery/'.$content->id)->with('msg', 'Gallery berhasil diedit!');
            }
        }

        return abort(403);
    }

    public function submit($id)
    {   
        // before gallery status = 0
        $content = Content::findOrFail($id);
        $this_user = auth()->user();

        $users = User::all();

        if (auth()->user()->role->add_content == 1 && $content->created_by ==  $this_user->id) {
            $content->status = 1;
            $content->updated_by = auth()->user()->id;
            $content->save();

            
            foreach ($users as $user) {
                if ($user->role->approve_content == 1) {
                    $user->notify(new SubmitGallery);
                }
            }

            return redirect('gallery')->with('msg', '1 gallery berhasil di submit');
        }

        return abort(403);
    }

    public function approve($id)
    {   
        // before gallery status = 0
        $content = Content::findOrFail($id);
        $this_user = auth()->user();

        $user = User::where('id', $content->created_by)->first();
        // dd($user);

        if (auth()->user()->role->approve_content == 1) {
            $content->status = 2;
            $content->updated_by = auth()->user()->id;
            $content->save();

            $user->notify(new ApproveGallery);
            
            return redirect('gallery')->with('msg', '1 gallery berhasil di approve');
        }

        return abort(403);
    }

    public function reject($id)
    {   
        // before gallery status = 0
        $content = Content::findOrFail($id);
        $this_user = auth()->user();

        $user = User::where('id', $content->created_by)->first();
        // dd($user);

        if (auth()->user()->role->approve_content == 1) {
            $content->status = 9;
            $content->updated_by = auth()->user()->id;
            $content->save();

            $user->notify(new RejectGallery);
            
            return redirect('gallery')->with('msg', '1 gallery berhasil di reject');
        }

        return abort(403);
    }

    public function destroy($id)
    {
        if (auth()->user()->role->add_content == 1) {
        $content = Content::where('is_gallery', 1)->findOrFail($id);
        $content->delete();
        return back()->with('msg', '1 galeri berhasil dihapus!');
        }

        return abort(403);
   }

}
