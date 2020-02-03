<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Blog;
use App\Home;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $blog   = Blog::orderBy('created_at','DESC')->select('id','judul_blog','image','created_at')->get();
        $random = Blog::select('id','judul_blog','image','created_at')->get();
        if(count($random) > 2){
            $random = $random->random(2);
        }
        $home   = Home::all();
        return view('admins.blog.index', compact('blog','random','home'));
    }
    public function store(Request $request){
        try{
            $blog               = new Blog();
            $blog->judul_blog   = $request->get('judul_blog');
            // dd($request->hasFile('image'));
            if($request->hasFile('image')){
                $extension = strtolower($request->file('image')->getClientOriginalExtension());
                $fileName = Str::random(40) . '.' . $extension;
                $request->file('image')->move('image/blog/', $fileName);
                $blog->image        = $fileName;
            }
            $blog->isi_blog     =$request->get('isi_blog');
            $blog->save();
            return redirect()->back();
        }catch(Exception $e){
            return redirect()->back();
        }
    }
    public function destroy($id, $judul_blog){
        try {
            $blog   = Blog::find($id);
            if($blog->judul_blog == $judul_blog){
                unlink('image/blog/'.$blog->image);
                $blog->delete();
                return redirect()->back();
            }
            return redirect()->back();
        } catch (Exception $th) {
            return redirect()->back();
        }
    }
    public function data($id, $judul_blog){
        try{
            $data   = Blog::find($id);
            $blogs  = Blog::where('id','!=',$id)->orderBy('created_at', 'DESC')->select('id','isi_blog','image','judul_blog','created_at')->limit(3)->get();
            $random = Blog::select('id','judul_blog','image','created_at')->get();
            if(count($random) > 2){
                $random = $random->random(2);
            }
            $home   = Home::all();
            if($data && $data->judul_blog == $judul_blog){
                return view('admins.blog.detail', compact('data','blogs','random','home'));
            }
            return abort(404);
        }catch(Exception $e){
            return redirect()->back();
        }
    }
}
