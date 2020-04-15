<div class="page-container">
    @yield('modal')
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <form class="form-header" action="" method="POST">
                    </form>
                    <div class="header-button">
                        @include('operators.layout.footer-notif')
                        @include('operators.layout.footer-account')
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">@yield('judul-page')</h2>
                            @yield('button')
                        </div>
                    </div>
                </div>
                @yield('content')
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright © 2019 DonutTimAmpga. <a href="@if(\App\Home::where('jenis','footer-link')->first()){{\App\Home::where('jenis','footer-link')->first()->isi}}@endif" target="_blank">@if(\App\Home::where('jenis','footer-judul')->first()){{\App\Home::where('jenis','footer-judul')->first()->isi}}@else Masukkan Footer @endif</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>