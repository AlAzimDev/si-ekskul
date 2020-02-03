<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Home;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $random = Blog::select('id','judul_blog','image','created_at')->get();
        if(count($random) > 2){
            $random = $random->random(2);
        }
        $blogs  = Blog::orderBy('created_at','DESC')->limit(3)->get();
        $home   = Home::all();
        return view('home',compact('random','blogs','home'));
    }
    public function blog()
    {
        $random = Blog::select('id','judul_blog','image','created_at')->get();
        if(count($random) > 2){
            $random = $random->random(2);
        }
        $blogs  = Blog::orderBy('created_at','DESC')->get();
        $home   = Home::all();
        return view('blog',compact('random','home','blogs'));
    }
    public function blog_detail($id, $judul_blog){
        try{
            $data   = Blog::find($id);
            $blogs  = Blog::where('id','!=',$id)->orderBy('created_at', 'DESC')->select('id','isi_blog','image','judul_blog','created_at')->limit(3)->get();
            $random = Blog::select('id','judul_blog','image','created_at')->get();
            if(count($random) > 2){
                $random = $random->random(2);
            }
            $home   = Home::all();
            if($data && $data->judul_blog == $judul_blog){
                return view('blog-detail', compact('data','blogs','random','home'));
            }
            return abort(404);
        }catch(Exception $e){
            return redirect()->back();
        }
    }
    public function events()
    {
        return view('events');
    }
}
