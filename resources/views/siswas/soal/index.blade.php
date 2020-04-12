@extends('siswas.layout.header')

@section('judul-page','Soal')

@section('head')
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
@endsection

@section('content')
<div class="col-lg-12">
  <div class="card">
    <div class="card-body">
      <form id="regForm" name="regForm" method="post">
        @csrf
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          @php
          $no1 = 1;
          $no2 = 1;
          @endphp
          @foreach($data as $angka)
          <li class="nav-item">
            <a class="nav-link nav-link-tab" onClick="cekAngka({{$no1}})" id="pills-1-tab" data-toggle="pill"
              href="#{{$angka->id}}" role="tab" aria-controls="pills-1" value="0" aria-selected="true">{{$no1}}@php $no1++
              @endphp</a>
          </li>
          @endforeach
        </ul>
        <div class="tab-content pl-3 pt-2" id="nav-tabContent">
          @foreach($data as $angka)
          <div class="tab-pane fade" id="{{$angka->id}}" role="tabpanel" aria-labelledby="custom-nav-home-tab">
            <p class="float-left">{!!$no2.".".$angka->soal!!}</p>
            <textarea name="answer[]" rows="8" class="form-control" id="{{$angka->id}}">@if(App\Answer::where([['id_datasoal',$angka->id],['id_user',Auth::User()->id]])->get()->first()){{App\Answer::where([['id_datasoal',$angka->id],['id_user',Auth::User()->id]])->get()->first()->jawaban}}@endif</textarea>@php $no2++ @endphp
          </div>
          @endforeach
          <br />
          <div>
            <button class="btn btn-primary float-right" id="next" onClick="nextPrev(1)">Next</button>
            <button class="btn btn-light float-left" id="previous" onClick="nextPrev(-1)">Previous</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('script')
<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
<script type="text/javascript">
  $('.btn').click(function (event) {
    event.preventDefault();
    var target = $(this).data('target')
  });
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var currentTab = 0;
  var angka = 1;

  showTab(currentTab);
  subNex();

  function showTab(n) {
    var x = document.getElementsByClassName("tab-pane");
    var y = document.getElementsByClassName("nav-link-tab");
    x[n].className += " show active";
    y[n].className += " active";
  }
  function nextPrev(n) {
    var x = document.getElementsByClassName("tab-pane");
    var y = document.getElementsByClassName("nav-link-tab");
    if(document.getElementById("next").innerHTML == 'Submit' && n == 1){
      window.location = "{{route('selesaikan-test')}}";
    }
    if ((currentTab == 0) && (n == -1)) return false;
    if (!validateForm()) return false;
    if ((currentTab == x.length - 1) && n == 1) {
      return false;
    }
    x[currentTab].className = "tab-pane";
    y[currentTab].className = "nav-link nav-link-tab";
    currentTab = currentTab + n;
    subNex();
    showTab(currentTab);
  }
  function validateForm() {
    var x, y, i, valid = true;
    var x = document.getElementsByClassName("tab-pane");
    y = x[currentTab].getElementsByTagName("textarea");
    if(y[0].value == ""){
      $.ajax({
        data: $('#regForm').serialize(),
        url: '/siswa/soal/answer/' + y[0].id + '/answer/NULL',
        type: 'post',
        dataType: 'json',
        success: function (data) {
          console.log('Success!');
        }
      });
    }else{
      $.ajax({
        data: $('#regForm').serialize(),
        url: '/siswa/soal/answer/' + y[0].id + '/answer/' + y[0].value,
        type: 'post',
        dataType: 'json',
        success: function (data) {
          console.log('Success!');
        }
      });
    }
    return valid; // return the valid status
  }
  function cekAngka(n) {
    if (!validateForm()) return false;
    showTab(currentTab);
    currentTab = n - 1;
    subNex();
  }
  function subNex() {
    if (currentTab == document.getElementsByClassName("tab-pane").length - 1) {
      document.getElementById("next").innerHTML = 'Submit';
      document.getElementById("previous").hidden = false;
    } else if (currentTab == 0) {
      document.getElementById("next").innerHTML = 'Next';
      document.getElementById("previous").hidden = true;
    } else {
      document.getElementById("next").innerHTML = 'Next';
      document.getElementById("previous").hidden = false;
    }
  }
</script>
<script src="{{ asset('user_components/jquery.min.js') }}"></script>
<script src="{{ asset('user_components/jquery.steps.js') }}"></script>
@endsection