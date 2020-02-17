<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use App\Home;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index()
    {
        return view('admins.index');
    }
    public function home()
    {
        $random = Blog::select('id','judul_blog','image','created_at')->get();
        if(count($random) > 2){
            $random = $random->random(2);
        }
        $home   = Home::all();
        return view('admins.home',compact('random','home'));
    }
    public function modal1(Request $request)
    {
        $request->validate([
            'bg1_image' => 'image|mimes:jpeg,jpg',
        ]);
        if($request->hasFile('bg1_image')){
            $extension = strtolower($request->file('bg1_image')->getClientOriginalExtension());
            $request->file('bg1_image')->move('image/home/', 'bg1-image.jpg');
        }
        Home::updateOrCreate(
            ['jenis' => 'judul-besar'],
            ['isi' => $request->get('judul_besar')]
        );
        return back();
    }
    public function modal2(Request $request)
    {
        $request->validate([
            'ct1_image' => 'image|mimes:jpeg,jpg',
            'ct2_image' => 'image|mimes:jpeg,jpg',
        ]);
        if($request->hasFile('ct1_image')){
            $extension = strtolower($request->file('ct1_image')->getClientOriginalExtension());
            $request->file('ct1_image')->move('image/home/', 'ct1-image.jpg');
        }
        if($request->hasFile('ct2_image')){
            $extension = strtolower($request->file('ct2_image')->getClientOriginalExtension());
            $request->file('ct2_image')->move('image/home/', 'ct2-image.jpg');
        }
        Home::updateOrCreate(
            ['jenis' => 'judul-kecil'],
            ['isi' => $request->get('judul_kecil')]
        );
        Home::updateOrCreate(
            ['jenis' => 'description1'],
            ['isi' => $request->get('description1')]
        );
        Home::updateOrCreate(
            ['jenis' => 'w1'],
            ['isi' => $request->get('w1')]
        );
        Home::updateOrCreate(
            ['jenis' => 'w2'],
            ['isi' => $request->get('w2')]
        );
        Home::updateOrCreate(
            ['jenis' => 'w3'],
            ['isi' => $request->get('w3')]
        );
        return back();
    }
    public function modal3(Request $request)
    {
        $request->validate([
            'bg2_image' => 'image|mimes:jpeg,jpg',
        ]);
        if($request->hasFile('bg2_image')){
            $extension = strtolower($request->file('bg2_image')->getClientOriginalExtension());
            $request->file('bg2_image')->move('image/home/', 'bg2-image.jpg');
        }
        Home::updateOrCreate(
            ['jenis' => 'judul-menengah'],
            ['isi' => $request->get('judul_menengah')]
        );
        Home::updateOrCreate(
            ['jenis' => 'link-video'],
            ['isi' => $request->get('link_video')]
        );
        return back();
    }
    public function modal4(Request $request)
    {
        Home::updateOrCreate(
            ['jenis' => 'description2'],
            ['isi' => $request->get('description2')]
        );
        Home::updateOrCreate(
            ['jenis' => 'social-facebook'],
            ['isi' => $request->get('social_facebook')]
        );
        Home::updateOrCreate(
            ['jenis' => 'social-instagram'],
            ['isi' => $request->get('social_instagram')]
        );
        Home::updateOrCreate(
            ['jenis' => 'social-twitter'],
            ['isi' => $request->get('social_twitter')]
        );
        return back();
    }
    public function modal5(Request $request)
    {
        $request->validate([
            'bg3_image' => 'image|mimes:jpeg,jpg',
        ]);
        if($request->hasFile('bg3_image')){
            $extension = strtolower($request->file('bg3_image')->getClientOriginalExtension());
            $request->file('bg3_image')->move('image/home/', 'bg3-image.jpg');
        }
        Home::updateOrCreate(
            ['jenis' => 'footer-link'],
            ['isi' => $request->get('footer_link')]
        );
        Home::updateOrCreate(
            ['jenis' => 'footer-judul'],
            ['isi' => $request->get('footer_judul')]
        );
        return back();
    }
}
