<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use App\Home;

class HomeController extends Controller
{
    public function __construct()
    {

    }
    public function index()
    {
        return view('admins.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function home(){
        $random = Blog::select('id','judul_blog','image','created_at')->get();
        if(count($random) > 2){
            $random = $random->random(2);
        }
        $blogs  = Blog::orderBy('created_at','DESC')->limit(3)->get();
        $home   = Home::all();
        return view('admins.home',compact('random','blogs','home'));
    }
}
