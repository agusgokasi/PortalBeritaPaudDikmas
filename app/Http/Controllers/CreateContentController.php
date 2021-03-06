<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\Role;
use App\Category;
use App\Content;

class CreateContentController extends Controller
{

    // news create
    public function newsCreate()
    {
        if (auth()->user()->role->add_content == 1) {
            return view('konten.news.create_news');
        }
        
        return abort(403);
    }

    // post news
    public function postNews(Request $request)
    {   

        if (auth()->user()->role->add_content == 1) {
            $this->validate($request, [
                'title'              => 'required|min:3|max:150',
                'banner'             => 'required|mimes:jpeg,png,jpg,svg|max:10000',
                'description'        => 'required|min:3|max:250',
                'content'            => 'required',
            ],[
                'title.required'=>'Judul konten harus diisi',
                'title.min'=>'Judul konten minimal 3 huruf',
                'title.max'=>'Judul konten maksimal 150 huruf',

                'banner.required'=>'Thumbnail Photo wajib diisi',
                'banner.mimes'=>'Thumbnail Photo berformat .jpg,png,jpeg,svg',
                'banner.max'=>'Thumbnail Photo maksimal 10Mb',

                'description.required'=>'Deskripsi harus diisi',
                'description.min'=>'Deskripsi minimal 3 huruf',
                'description.max'=>'Deskripsi maksimal 250 huruf',

                'content.required'=>'Isi konten harus diisi',
            ]);

            $file = $request->file('banner');
            $filename = time().rand(1000,9999).'.'.$file->getClientOriginalExtension();
            $path = public_path('/banner/thumbnews');
            $thumbnews = Image::make($file->getRealPath())->resize(300, 200)->save($path.'/'.$filename, 100 );

            $created_by = auth()->user()->id;

            $content = Content::create([
                    'title'  => $request['title'],
                    'banner' => $filename,
                    'description' => $request['description'],
                    'content' => $request['content'],
                    'category_id' => 1,
                    'status' => 0,
                    'is_news' => 1,
                    'created_by' => $created_by,
                ]);

            return redirect('news')->with('msg', 'Berita berhasil dibuat!');
        }

        return abort(403);
    }
    
}











// // create page
//     public function createPage()
//     {
//         return view('konten.create_page');
//     }

//     // post page
//     public function postPage(Request $request)
//     {

//         $this->validate($request, [
//             'title'              => 'required|min:3|max:150',
//             'content'            => 'required',
//         ],[
//             'title.required'=>'Judul konten harus diisi',
//             'title.min'=>'Judul konten minimal 3 huruf',
//             'title.max'=>'Judul konten maksimal 150 huruf',

//             'content.required'=>'Isi konten harus diisi',
//         ]);

//         $created_by = auth()->user()->id;

//         // dd($created_by, $updated_by);

//         $content = Content::create([
//                 'title'  => $request['title'],
//                 'content' => $request['content'],
//                 'category_id' => 1,
//                 'status' => 0,
//                 'is_page' => 1,
//                 'created_by' => $created_by,
//             ]);

//         return redirect('/konten')->with('msg', 'Konten berhasil dibuat!');
//     }

//     // page link
//     public function createLink()
//     {
//         return view('konten.create_link');
//     }

//     public function postLink(Request $request)
//     {

//         $this->validate($request, [
//             'title'              => 'required|min:3|max:150',
//             'content'            => 'required',
//         ],[
//             'title.required'=>'Judul konten harus diisi',
//             'title.min'=>'Judul konten minimal 3 huruf',
//             'title.max'=>'Judul konten maksimal 150 huruf',

//             'content.required'=>'Isi konten harus diisi',
//         ]);

//         $created_by = auth()->user()->id;

//         // dd($created_by, $updated_by);

//         $content = Content::create([
//                 'title'  => $request['title'],
//                 'content' => $request['content'],
//                 'category_id' => 1,
//                 'status' => 0,
//                 'is_page_link' => 1,
//                 'created_by' => $created_by,
//             ]);
//         return redirect('/konten')->with('msg', 'Konten berhasil dibuat!');
//     }

//     // headline
//     public function createHeadline()
//     {
//         return view('konten.create_headline');
//     }

//     public function postHeadline(Request $request)
//     {

//         $this->validate($request, [
//             'title'              => 'required|min:3|max:150',
//             'content'            => 'required',
//             'banner'             => 'required|mimes:jpg,png,jpeg,gif|max:10000kb',
//         ],[
//             'title.required'=>'Judul konten harus diisi',
//             'title.min'=>'Judul konten minimal 3 huruf',
//             'title.max'=>'Judul konten maksimal 150 huruf',

//             'content.required'=>'Isi konten harus diisi',

//             'banner.max'=>'Banner maksimal 10Mb',
//             'banner.mimes'=>'Banner berformat .jpg,png,jpeg,gif',
//         ]);

//         // file
//         if(!$request[('banner')] == ''){
//             $file = $request->file('banner');
//             $banner = time() . '-' .  $file->getClientOriginalName();
//             $request->file('banner')->storeAs('public/banner', $banner);
//         }else{
//             $banner = '';
//         }

//         $created_by = auth()->user()->id;

//         // dd($created_by, $updated_by);

//         $content = Content::create([
//                 'title'  => $request['title'],
//                 'content' => $request['content'],
//                 'category_id' => 1,
//                 'status' => 0,
//                 'is_headline' => 1,
//                 'banner' => $banner,
//                 'created_by' => $created_by,
//             ]);
//         return redirect('/konten')->with('msg', 'Konten berhasil dibuat!');
//     }


// // gallery
//     public function createGallery()
//     {
//         return view('konten.create_gallery');
//     }

//     public function postGallery(Request $request)
//     {

//         $this->validate($request, [
//             'title'              => 'required|min:3|max:150',
//             'content'            => 'required',
//         ],[
//             'title.required'=>'Judul konten harus diisi',
//             'title.min'=>'Judul konten minimal 3 huruf',
//             'title.max'=>'Judul konten maksimal 150 huruf',

//             'content.required'=>'Isi konten harus diisi',
//         ]);

//         $created_by = auth()->user()->id;
        
//         $content = Content::create([
//                 'title'  => $request['title'],
//                 'content' => $request['content'],
//                 'category_id' => 1,
//                 'status' => 0,
//                 'is_gallery' => 1,
//                 'created_by' => $created_by,
//             ]);
//         return redirect('/konten')->with('msg', 'Konten berhasil dibuat!');
//     }



// public function create()
//     {
//         $kategoris = Category::where('is_content', '1')->get();
//         return view('konten.create_konten', compact('kategoris'));
//     }

//     public function post(Request $request)
//     {

//         $this->validate($request, [
//             'title'              => 'required|min:3|max:150',
//             'konten'             => 'required',
//             'content'            => 'required|max:255',
//             'date'               => 'required',
//             'banner'             => 'mimes:jpg,png,jpeg,gif|max:10000kb',

//         ],[
//             'title.required'=>'Judul konten harus diisi',
//             'title.min'=>'Judul konten minimal 3 huruf',
//             'title.max'=>'Judul konten maksimal 150 huruf',

//             'konten.required'=>'Jenis konten harus diisi',

//             'content.required'=>'Isi konten harus diisi',
//             'content.max'=>'Isi konten maksimal 255 huruf',

//             'date.required'=>'Tanggal Konten Harus Di Isi',

//             'banner.max'=>'Banner maksimal 10Mb',
//             'banner.mimes'=>'Banner berformat .jpg,png,jpeg,gif',
//         ]);

//         // file
//         if(!$request[('banner')] == ''){
//         $file = $request->file('banner');
//         $banner = time() . '-' .  $file->getClientOriginalName();
//         $request->file('banner')->storeAs('public/banner', $banner);
//         }else{$banner = '';}

//         $kategoris = Category::where('is_content', '1')->get();
//         // dd($banner);

//         // Content::create([
//         //     'category_id'           => $request['konten'],
//         //     'name'                  => $request['name'],
//         //     'content'               => $request['content'],
//         //     'date'                  => $request['date'],
//         //     'banner'                => $banner,
//         // ]);
//         $konten = new Content;
//         $konten->category_id = $request['konten'];
//         $konten->title = $request['title'];
//         $konten->content = $request['content'];
//         $konten->date = $request['date'];
//         $konten->banner = $banner;
//         $konten->created_by = auth()->user()->id;
//         if($request['konten'] == '1'){
//             $konten->is_news = 1;
//             $konten->status = 0;
//         }elseif($request['konten'] == '2'){
//             $konten->is_page = 1;
//             $konten->status = 0;
//         }elseif($request['konten'] == '3'){
//             $konten->is_headline = 1;
//             $konten->status = 0;
//         }elseif($request['konten'] == '4'){
//             $konten->is_page_link = 1;
//             $konten->status = 0;
//         }elseif($request['konten'] == '5'){
//             $konten->is_gallery = 1;
//             $konten->status = 0;
//         }
//         $konten->save();

//         return redirect('/konten')->with('msg', 'Konten berhasil dibuat!');
//     }