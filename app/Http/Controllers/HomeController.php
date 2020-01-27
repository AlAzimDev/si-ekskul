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
        $random = Blog::all()->random(2);
        return view('blog',compact('random'));
    }
    public function events()
    {
        return view('events');
    }
}
