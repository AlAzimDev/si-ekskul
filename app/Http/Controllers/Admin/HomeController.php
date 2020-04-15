<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use App\Answer;
use App\Blog;
use App\DataSoal;
use App\Home;
use App\Soal;
use App\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $timeNow    = Carbon::now();
        $nama_bulans = [];
        $bulans = [];
        $tahuns = [];
        for ($i=0; $i < 6 ; $i++) {
            if($timeNow->format('m') < ($i+1)){
                $bulans[] = (12 + ($timeNow->format('m') - $i));
                $tahuns[] = $timeNow->format('Y') - 1;
            }else{
                $bulans[] = $timeNow->format('m') - $i;
                $tahuns[] = $timeNow->format('Y') + 0;
            }
        }
        $jumlah_users = [];
        for ($i=0; $i < count($bulans) ; $i++) { 
            $jumlah_users[] = User::whereMonth('created_at',$bulans[$i])->whereYear('created_at',$tahuns[$i])->get()->count();
        }
        $jumlah_useradmin = [];
        for ($i=0; $i < count($bulans) ; $i++) { 
            $jumlah_useradmin[] = User::where('role',2)->whereMonth('created_at',$bulans[$i])->whereYear('created_at',$tahuns[$i])->get()->count();
        }
        $jumlah_userpetugas = [];
        for ($i=0; $i < count($bulans) ; $i++) { 
            $jumlah_userpetugas[] = User::where('role',1)->whereMonth('created_at',$bulans[$i])->whereYear('created_at',$tahuns[$i])->get()->count();
        }
        $jumlah_usersiswa = [];
        for ($i=0; $i < count($bulans) ; $i++) { 
            $jumlah_usersiswa[] = User::where('role',0)->whereMonth('created_at',$bulans[$i])->whereYear('created_at',$tahuns[$i])->get()->count();
        }
        for ($i=0; $i < count($bulans) ; $i++) { 
            if($bulans[$i] == 1){
                $nama_bulans[] = "Januari";
            }else if($bulans[$i] == 2){
                $nama_bulans[] = "Februari";
            }else if($bulans[$i] == 3){
                $nama_bulans[] = "Maret";
            }else if($bulans[$i] == 4){
                $nama_bulans[] = "April";
            }else if($bulans[$i] == 5){
                $nama_bulans[] = "Mei";
            }else if($bulans[$i] == 6){
                $nama_bulans[] = "Juni";
            }else if($bulans[$i] == 7){
                $nama_bulans[] = "Juli";
            }else if($bulans[$i] == 8){
                $nama_bulans[] = "Agustus";
            }else if($bulans[$i] == 9){
                $nama_bulans[] = "September";
            }else if($bulans[$i] == 10){
                $nama_bulans[] = "Oktober";
            }else if($bulans[$i] == 11){
                $nama_bulans[] = "November";
            }else if($bulans[$i] == 12){
                $nama_bulans[] = "Desember";
            }
        }

        //user
        $users = User::pluck('created_at');
        //Answer
            //id_datasoal yang ada di answer
        $id_datasoalsNULL = Answer::where('persentasi',NULL)->pluck('id_datasoal')->toArray();
        $id_datasoalsNOTNULL = Answer::whereNotNull('persentasi')->pluck('id_datasoal')->toArray();
        
            //id_soal yang ada di answer
        $id_soalsNULL = DataSoal::whereIn('id',$id_datasoalsNULL)->pluck('id_soal')->toArray();
        $id_soalsNOTNULL = DataSoal::whereIn('id',$id_datasoalsNOTNULL)->pluck('id_soal')->toArray();
            
            //id_user yang ada di answer
        // $id_usersNULL = Answer::where('persentasi',NULL)->pluck('id_user')->toArray();
        // $id_usersNOTNULL = Answer::whereNotNull('persentasi')->pluck('id_user')->toArray();

            //foreach
        $nilai_NULL = 0;
        $nilai_NOTNULL = 0;
        foreach (Soal::whereIn('id',$id_soalsNULL)->get() as $data) {
            $id_datasoalsNULL = DataSoal::where('id_soal',$data->id)->pluck('id')->toArray();
            $id_usersNULL = Answer::where('persentasi',NULL)->whereIn('id_datasoal',$id_datasoalsNULL)->pluck('id_user')->toArray();
            foreach (User::whereIn('id',$id_usersNULL)->get() as $user) {
                $nilai_NULL++;
            }
        }
        foreach (Soal::whereIn('id',$id_soalsNOTNULL)->get() as $data) {
            $id_datasoalsNOTNULL = DataSoal::where('id_soal',$data->id)->pluck('id')->toArray();
            $id_usersNOTNULL = Answer::where('persentasi',"!=",NULL)->whereIn('id_datasoal',$id_datasoalsNOTNULL)->pluck('id_user')->toArray();
            foreach (User::whereIn('id',$id_usersNOTNULL)->get() as $user) {
                $nilai_NOTNULL++;
            }
        }
        $role0 = User::where('role',0)->count();
        $role1 = User::where('role',1)->count();
        $role2 = User::where('role',2)->count();
        return view('admins.index', compact('users','jumlah_users','jumlah_useradmin','jumlah_userpetugas','jumlah_usersiswa','nama_bulans','nilai_NULL','nilai_NOTNULL','role0','role1','role2'));
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
