<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\Role;
use App\Photo;
use App\Category;
use App\Content;
use App\User;
use DataTables;
use App\Notifications\SubmitNews;
use App\Notifications\ApproveNews;
use App\Notifications\RejectNews;

class ContentController extends Controller
{
    //all done
    public function indexKonten()
    {
        
        $users = User::all();
        if ( auth()->user()->role->add_content == 1) {
            auth()->user()->unreadNotifications->where('type', 'App\Notifications\ApproveNews')->markAsRead();
        }
        if ( auth()->user()->role->add_content == 1) {
            auth()->user()->unreadNotifications->where('type', 'App\Notifications\ApproveHeadlines')->markAsRead();
        }
        if ( auth()->user()->role->add_content == 1) {
            auth()->user()->unreadNotifications->where('type', 'App\Notifications\ApproveGallery')->markAsRead();
        }
        
        return view('konten.index_konten');
    }

    public function apiKonten(Request $request)
    {

        $data = Content::orderBy('updated_at', 'desc')->get();

        if (auth()->user()->role->approve_content == 0) {
            $data = $data->where('status', '!=', '0')->where('status', '!=', '1')->where('status', '!=', '9')->where('created_by', auth()->user()->id); // content yg user buat
        }elseif (auth()->user()->role->approve_content == 1) {
            $data = $data->where('status', '2'); // semua content yg di approve
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
                    }elseif ($model->status == 8) {
                        return '<span class="bg-secondary text-light rounded" style="padding: 5px">Duplicated</span>';
                    }elseif ($model->status == 9) {
                        return '<span class="bg-danger text-light rounded" style="padding: 5px">Rejected</span>';
                    }
                    else {
                        return '-';
                    }
                })

                ->editColumn('jenis', function ($model) {
                    if ($model->is_news == 1) {
                        return 'Berita';
                    }elseif ($model->is_headline == 1) {
                        return 'Headline';
                    }elseif ($model->is_gallery == 1) {
                        return 'Galeri';
                    }
                    else {
                        return '-';
                    }
                })

                ->addColumn('detail', 'konten._btn_detail')

                ->addColumn('action', 'konten._btn_action')

                ->rawColumns(['jenis', 'detail', 'action', 'status'])
                ->toJson();
    }

    public function showKonten($id)
    {
        $content = Content::findOrFail($id);
        $photos = Photo::where('content_id', $content->id)->get();
        return view('konten.show_konten', compact('content', 'photos') );
    }

    //workflow
    public function indexNews()
    {
        
        $users = User::all();

        if (auth()->user()->role->approve_content == 1) {
            foreach ($users as $user) {
                $user->unreadNotifications->where('type', 'App\Notifications\SubmitNews')->markAsRead();
            }
        }

        if ( auth()->user()->role->add_content == 1) {
            auth()->user()->unreadNotifications->where('type', 'App\Notifications\RejectNews')->markAsRead();
        }

        return view('konten.index_konten');
    }

    public function apiNews(Request $request)
    {

        $data = Content::where('is_news', 1)->where('status', '!=', '2')->where('status', '!=', '8')->orderBy('updated_at', 'desc')->get();

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
                    }elseif ($model->status == 8) {
                        return '<span class="bg-secondary text-light rounded" style="padding: 5px">Duplicated</span>';
                    }elseif ($model->status == 9) {
                        return '<span class="bg-danger text-light rounded" style="padding: 5px">Rejected</span>';
                    }
                    else {
                		return '-';
                	}
                })

                ->addColumn('detail', 'konten.news._btn_detail')

                ->addColumn('action', 'konten.news._btn_action')

                ->rawColumns(['detail', 'action', 'status'])
                ->toJson();
    }

    public function showNews($id)
    {
        $content = Content::where('is_news', 1)->findOrFail($id);
        return view('konten.news.show_news', compact('content') );
    }


}


// public function edit($id)
//     {
//         // Check Permissions
//         $this->user = Auth::user()->role_id;
//         $roles = Role::where('id', $this->user)->first();
//         if($roles->edit_content == 0) abort(403);
        
//         $kontens = Content::findOrFail($id);
//         return view('Konten.edit_konten', compact('kontens'));
//     }

//     public function update($id, Request $request)
//     {
//         // Check Permissions
//         $this->user = Auth::user()->role_id;
//         $roles = Role::where('id', $this->user)->first();
//         if($roles->edit_category == 0) abort(403);

//         $this->validate($request, [
//             'name'          => 'required|min:3|max:150',
//         ],[
//             'name.required'=>'Nama Kategori harus diisi',
//             'name.min'=>'Nama Kategori minimal 3 huruf',
//             'name.max'=>'Nama Kategori maksimal 150 huruf',
//         ]);
//         Kategori::findOrFail($id)->update([
//             'name'          => $request['name'],
//         ]);

//         return redirect('/kategori')->with('msg', 'Kategori berhasil diedit!');
//     }