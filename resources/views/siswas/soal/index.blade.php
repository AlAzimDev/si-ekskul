@extends('siswas.layout.header')

@section('judul-page','Soal')

@section('head')
@endsection

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                @php
                    $no1 = 1;
                @endphp
                @foreach($data as $angka)
                <li class="nav-item">
                    <a class="nav-link nav-link-tab" onClick="cekAngka({{$no1}})" id="pills-1-tab" data-toggle="pill" href="#{{$angka->id}}" role="tab" aria-controls="pills-1" value="0"
                        aria-selected="true">{{$no1}}@php $no1++ @endphp</a>
                </li>
                @endforeach
            </ul>
            <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                @foreach($data as $angka)
                <div class="tab-pane fade" id="{{$angka->id}}" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                    <p>{!!$angka->soal!!}</p>
                </div>
                @endforeach
                <div>
                    <button class="btn btn-primary float-right" id="next" onClick="nextPrev(1)">Next</button>
                    <button class="btn btn-light float-left" id="previous" onClick="nextPrev(-1)">Previous</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript"> 
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
        if ((currentTab == 0) && (n == -1)) return false;
        if ((currentTab == x.length-1) && n == 1) {
            return false;
        }
        x[currentTab].className = "tab-pane";
        y[currentTab].className = "nav-link nav-link-tab";
        currentTab = currentTab + n;
        subNex();
        showTab(currentTab);
    }
    function cekAngka(n){
        showTab(currentTab);
        currentTab = n - 1;
        subNex();
    }
    function subNex(){
        if(currentTab == document.getElementsByClassName("tab-pane").length-1){
            document.getElementById("next").innerHTML = 'Submit';
            document.getElementById("previous").hidden = false;
        }else if(currentTab == 0){
            document.getElementById("next").innerHTML = 'Next';
            document.getElementById("previous").hidden = true;
        }else{
            document.getElementById("next").innerHTML = 'Next';
            document.getElementById("previous").hidden = false;
        }
    }
</script>
@endsection