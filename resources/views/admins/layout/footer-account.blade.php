<div class="account-wrap">
    <div class="account-item clearfix js-item-menu">
        <div class="image">
            <img src="{{asset('admin/images/icon/avatar-01.jpg')}}" alt="@if(Auth::User() != null){{ Auth::User()->name }}@else Admin @endif" />
        </div>
        <div class="content">
            <a class="js-acc-btn" href="#">@if(Auth::User() != null){{ Auth::User()->name }}@else Admin @endif</a>
        </div>
        <div class="account-dropdown js-dropdown">
            <div class="info clearfix">
                <div class="image">
                    <a href="#">
                        <img src="{{asset('admin/images/icon/avatar-01.jpg')}}" alt="@if(Auth::User() != null){{ Auth::User()->name }}@else Admin @endif" />
                    </a>
                </div>
                <div class="content">
                    <h5 class="name">
                        <a href="#">@if(Auth::User() != null){{ Auth::User()->name }}@else Admin @endif</a>
                    </h5>
                    <span class="email">@if(Auth::User() != null){{ Auth::User()->email }}@else admin@example.com @endif</span>
                </div>
            </div>
            <div class="account-dropdown__body">
                <div class="account-dropdown__item">
                    <a href="#">
                        <i class="zmdi zmdi-account"></i>Account</a>
                </div>
                <div class="account-dropdown__item">
                    <a href="#">
                        <i class="zmdi zmdi-settings"></i>Setting</a>
                </div>
            </div>
            <div class="account-dropdown__footer">
                <a href="#">
                    <i class="zmdi zmdi-power"></i>Logout</a>
            </div>
        </div>
    </div>
</div>