<div class="noti-wrap">
  <div class="noti__item clearfix js-item-menu">
    <i class="zmdi zmdi-notifications" id="quantity_notif"></i>
    @if(App\Notifikasi::where([['id_user',Auth::User()->id],['status',0]])->get()->count() > 0)
    <span class="quantity" id="quantity_notif" id="notif">{{App\Notifikasi::where([['id_user',Auth::User()->id],['status',0]])->get()->count()}}</span>
    @endif
    <div class="mess-dropdown js-dropdown">
      <div class="notifi__title">
        <p>Kamu Memilliki {{App\Notifikasi::where('id_user',Auth::User()->id)->get()->count()}} Notifikasi</p>
      </div>
      @foreach(App\Notifikasi::where('id_user',Auth::User()->id)->orderBy('id','DESC')->get() as $data)
      <div class="notifi__item">
        <div id="notif_h" class="bg-c2 img-cir img-40">
          <i class="zmdi zmdi-delete" onclick="window.location.href='{{URL::to('siswa/notif/'.$data->id.'/delete')}}'"></i>
        </div>
        <div class="content" onclick="window.location.href='{{URL::to($data->url)}}'">
          <p>{{$data->judul_notifikasi}}</p>
          <span class="date">{{$data->isi_notifikasi}} {{$data->created_at}}</span>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>