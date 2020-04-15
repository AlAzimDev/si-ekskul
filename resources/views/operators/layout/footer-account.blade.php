<div class="account-wrap">
    <div class="account-item clearfix js-item-menu">
        <a class="js-acc-btn">@if(Auth::User() != null){{ Auth::User()->name }}@else Petugas @endif</a>
        <div class="account-dropdown js-dropdown">
            <div class="info clearfix">
                <h5 class="name">
                    <a>@if(Auth::User() != null){{ Auth::User()->name }}@else Petugas @endif</a>
                </h5>
                <span class="email">@if(Auth::User() != null){{ Auth::User()->email }}@else petugas@example.com @endif</span>
            </div>
            <div class="account-dropdown__footer">
                <a href="{{ route('logout') }}" form="form" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="zmdi zmdi-power"></i>Keluar</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            </div>
        </div>
    </div>
</div>