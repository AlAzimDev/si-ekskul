<div class="account-wrap">
    <div class="account-item clearfix js-item-menu">
        <div class="content">
            <a class="js-acc-btn">@if(Auth::User() != null){{ Auth::User()->name }}@else Admin @endif</a>
        </div>
        <div class="account-dropdown js-dropdown">
            <div class="info clearfix">
                <div class="content">
                    <h5 class="name">
                        <a>@if(Auth::User() != null){{ Auth::User()->name }}@else Admin @endif</a>
                    </h5>
                    <span class="email">@if(Auth::User() != null){{ Auth::User()->email }}@else admin@example.com @endif</span>
                </div>
            </div>
            <div class="account-dropdown__footer">
                <a href="{{ route('logout') }}" form="form" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="zmdi zmdi-power"></i>Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            </div>
        </div>
    </div>
</div>