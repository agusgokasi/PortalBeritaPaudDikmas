<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use DataTables;
use App\Role;
use App\Category;
use App\Content;
use App\User;
use App\Notifications\SubmitHeadlines;
use App\Notifications\ApproveHeadlines;
use App\Notifications\RejectHeadlines;

class HeadlineController extends Controller
{
    // headline create
    public function Create()
    {
        if (auth()->user()->role->add_content == 1) {
            return view('konten.headline.create_headline');
        }
        
        return abort(403);
    }

    // post headline
    public function post(Request $request)
    {   

        if (auth()->user()->role->add_content == 1) {
            $this->validate($request, [
                'title'              => 'required|min:3|max:150',
                'banner'             => 'required|mimes:jpeg,png,jpg,svg|max:20000|dimensions:width=1440,height=720',
                'content'            => 'required',
            ],[
                'title.required'=>'Judul headline harus diisi',
                'title.min'=>'Judul headline minimal 3 huruf',
                'title.max'=>'Judul headline maksimal 150 huruf',

                'banner.required'=>'Banner wajib diisi',
                'banner.mimes'=>'Banner berformat .jpg,png,jpeg,svg',
                'banner.max'=>'Banner maksimal 20Mb',
                'banner.dimensions'=>'Resolusi Banner tidak sesuai, gunakanlah resolusi 1440x720',

                'content.required'=>'Isi headline harus diisi',
            ]);

            $file = $request->file('banner');
            $filename = time().rand(1000,9999).'.'.$file->getClientOriginalExtension();
            $path = public_path('/banner/headline');
            $headline = Image::make($file->getRealPath())->save($path.'/'.$filename, 100 );

            $created_by = auth()->user()->id;

            $content = Content::create([
                    'title'  => $request['title'],
                    'banner' => $filename,
                    'content' => $request['content'],
                    'category_id' => 1,
                    'status' => 0,
                    'is_headline' => 1,
                    'created_by' => $created_by,
                ]);

            return redirect('headline')->with('msg', 'Headline berhasil dibuat!');
        }

        return abort(403);
    }

    public function index()
    {
        
        $users = User::all();

        if (auth()->user()->role->approve_content == 1) {
            foreach ($users as $user) {
                $user->unreadNotifications->where('type', 'App\Notifications\SubmitHeadlines')->markAsRead();
            }
        }

        if ( auth()->user()->role->add_content == 1) {
            auth()->user()->unreadNotifications->where('type', 'App\Notifications\RejectHeadlines')->markAsRead();
        }

        return view('konten.index_konten');
    }

    public function apiHeadlines(Request $request)
    {

        $data = Content::where('is_headline', 1)->where('status', '!=', '2')->orderBy('updated_at', 'desc')->get();

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

                ->addColumn('detail', 'konten.headline._btn_detail')

                ->addColumn('action', 'konten.headline._btn_action')

                ->rawColumns(['detail', 'action', 'status'])
                ->toJson();
    }

    public function show($id)
    {
        $content = Content::where('is_headline', 1)->findOrFail($id);
        return view('konten.headline.show_headline', compact('content') );
    }

    public function edit($id)
    {
    	if (auth()->user()->role->edit_content == 1) {
    		$content = Content::where('is_headline', 1)->findOrFail($id);

            return view('konten.headline.edit_headline', compact('content') );
        }
        
        return abort(403);
    }

    // post headline
    public function update(Request $request, $id)
    {   

        if (auth()->user()->role->edit_content == 1) {

        	$content = Content::where('is_headline', 1)->findOrFail($id);

            $this->validate($request, [
                'title'              => 'required|min:3|max:150',
                'banner'             => 'mimes:jpeg,png,jpg,svg|max:10000|dimensions:width=1440,height=720',
                'content'            => 'required',
            ],[
                'title.required'=>'Judul konten harus diisi',
                'title.min'=>'Judul konten minimal 3 huruf',
                'title.max'=>'Judul konten maksimal 150 huruf',

                'content.required'=>'Isi konten harus diisi',

                
                'banner.mimes'=>'Banner berformat .jpg,png,jpeg,svg',
                'banner.max'=>'Banner maksimal 10Mb',
                'banner.dimensions'=>'Resolusi Banner tidak sesuai, gunakanlah resolusi 1440x720',
            ]);


            
            $content->update([
                'title'  => $request['title'],
                'content' => $request['content'],
                'category_id' => 1,
                'is_headline' => 1,
            ]);

            $file = $request->file('banner');

            if ($file != null) {
                // $file = $request->file('banner');
                $filename = time().rand(1000,9999).'.'.$file->getClientOriginalExtension();
                $path = public_path('/banner/headline');
                $headline = Image::make($file->getRealPath())->save($path.'/'.$filename, 100 );
                $content->banner = $filename;
            }

            $content->updated_by = auth()->user()->id;

            $content->save();
            if($content->status == 0 || $content->status == 9){
                return redirect('headline')->with('msg', 'Headline berhasil diedit!');
            }elseif($content->status == 1){
                return redirect('headline/'.$content->id)->with('msg', 'Headline berhasil diedit!');
            }
        }

        return abort(403);
    }

    public function submit($id)
    {   
        // before headline status = 0
        $content = Content::where('is_headline', 1)->findOrFail($id);
        $this_user = auth()->user();

        $users = User::all();

        if (auth()->user()->role->add_content == 1 && $content->created_by ==  $this_user->id) {
            $content->status = 1;
            $content->updated_by = auth()->user()->id;
            $content->save();

            
            foreach ($users as $user) {
                if ($user->role->approve_content == 1) {
                    $user->notify(new SubmitHeadlines);
                }
            }

            return redirect('headline')->with('msg', '1 headline berhasil di submit');
        }

        return abort(403);
    }

    public function approve($id)
    {   
        // before headline status = 0
        $content = Content::where('is_headline', 1)->findOrFail($id);
        $this_user = auth()->user();

        $user = User::where('id', $content->created_by)->first();
        // dd($user);

        if (auth()->user()->role->approve_content == 1) {
            $content->status = 2;
            $content->updated_by = auth()->user()->id;
            $content->save();

            $user->notify(new ApproveHeadlines);
            
            return redirect('headline')->with('msg', '1 headline berhasil di approve');
        }

        return abort(403);
    }

    public function reject($id)
    {   
        // before headline status = 0
        $content = Content::where('is_headline', 1)->findOrFail($id);
        $this_user = auth()->user();

        $user = User::where('id', $content->created_by)->first();
        // dd($user);

        if (auth()->user()->role->approve_content == 1) {
            $content->status = 9;
            $content->updated_by = auth()->user()->id;
            $content->save();

            $user->notify(new RejectHeadlines);
            
            return redirect('headline')->with('msg', '1 headline berhasil di reject');
        }

        return abort(403);
    }

    public function destroy($id)
    {
        if (auth()->user()->role->add_content == 1) {
        $content = Content::where('is_headline', 1)->findOrFail($id);
        $content->delete();
        return back()->with('msg', '1 headline berhasil dihapus!');
        }

        return abort(403);
   }

}
