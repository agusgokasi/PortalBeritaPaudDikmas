<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use App\Role;
use App\Category;
use App\Content;
use App\User;
use App\Notifications\SubmitNews;
use App\Notifications\ApproveNews;
use App\Notifications\RejectNews;

class EditContentController extends Controller
{
    public function editNews($id)
    {
    	if (auth()->user()->role->edit_content == 1) {
    		$content = Content::where('is_news', 1)->findOrFail($id);

            return view('konten.news.edit_news', compact('content') );
        }
        
        return abort(403);
    }

    // post news
    public function updateNews(Request $request, $id)
    {   

        if (auth()->user()->role->edit_content == 1) {

        	$content = Content::where('is_news', 1)->findOrFail($id);

            $this->validate($request, [
                'title'              => 'required|min:3|max:150',
                'banner'             => 'mimes:jpeg,png,jpg,svg|max:10000',
                'description'        => 'required|min:3|max:250',
                'content'            => 'required',
            ],[
                'title.required'=>'Judul konten harus diisi',
                'title.min'=>'Judul konten minimal 3 huruf',
                'title.max'=>'Judul konten maksimal 150 huruf',

                'banner.mimes'=>'Thumbnail Photo berformat .jpg,png,jpeg,svg',
                'banner.max'=>'Thumbnail Photo maksimal 10Mb',

                'description.required'=>'Deskripsi harus diisi',
                'description.min'=>'Deskripsi minimal 3 huruf',
                'description.max'=>'Deskripsi maksimal 250 huruf',

                'content.required'=>'Isi konten harus diisi',
            ]);
            

            $content->update([
                'title'  => $request['title'],
                'description' => $request['description'],
                'content' => $request['content'],
                'category_id' => 1,
                'is_news' => 1,
            ]);

            if ($request->banner != null) {
                $file = $request->file('banner');
                $filename = time().rand(1000,9999).'.'.$file->getClientOriginalExtension();
                $path = public_path('/banner/thumbnews');
                $thumbnews = Image::make($file->getRealPath())->resize(300, 200)->save($path.'/'.$filename, 100 );

                $content->banner = $filename;
            }
            
            $content->updated_by = auth()->user()->id;
            $content->save();
            if($content->status == 0 || $content->status == 9){
                return redirect('news')->with('msg', 'Berita berhasil diedit!');
            }elseif($content->status == 1){
                return redirect('news/'.$content->id)->with('msg', 'Berita berhasil diedit!');
            }
        }

        return abort(403);
    }

    public function submit_news($id)
    {   
        // before news status = 0
        $content = Content::where('is_news', 1)->findOrFail($id);
        $this_user = auth()->user();

        $users = User::all();

        if (auth()->user()->role->add_content == 1 && $content->created_by ==  $this_user->id) {
            $contents = Content::create([
                'title'  => $content->title,
                'banner' => $content->banner,
                'description' => $content->description,
                'content' => $content->content,
                'category_id' => 1,
                'status' => 8,
                'is_news' => 1,
                'created_by' => $content->created_by,
            ]);
            $content->status = 1;
            $content->updated_by = auth()->user()->id;
            $content->save();

            
            foreach ($users as $user) {
                if ($user->role->approve_content == 1) {
                    $user->notify(new SubmitNews);
                }
            }

            return redirect('news')->with('msg', '1 berita berhasil di submit, dan histori berita yang anda submit tersimpan di tab konten saya');
        }

        return abort(403);
    }

    public function approve_news($id)
    {   
        // before news status = 0
        $content = Content::where('is_news', 1)->findOrFail($id);
        $this_user = auth()->user();

        $user = User::where('id', $content->created_by)->first();
        // dd($user);

        if (auth()->user()->role->approve_content == 1) {
            $content->status = 2;
            $content->updated_by = auth()->user()->id;
            $content->save();

            $user->notify(new ApproveNews);
            
            return redirect('news')->with('msg', '1 berita berhasil di approve');
        }

        return abort(403);
    }

    public function reject_news($id)
    {   
        // before news status = 0
        $content = Content::where('is_news', 1)->findOrFail($id);
        $this_user = auth()->user();

        $user = User::where('id', $content->created_by)->first();
        // dd($user);

        if (auth()->user()->role->approve_content == 1) {
            $content->status = 9;
            $content->updated_by = auth()->user()->id;
            $content->save();

            $user->notify(new RejectNews);
            
            return redirect('news')->with('msg', '1 berita berhasil di reject');
        }

        return abort(403);
    }

    public function destroy($id)
    {
        if (auth()->user()->role->add_content == 1) {
        $content = Content::where('is_news', 1)->findOrFail($id);
        $content->delete();
        return back()->with('msg', '1 berita berhasil dihapus!');
        }

        return abort(403);
   }

}
