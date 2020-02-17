<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="{{route('home')}}">
            <img src="{{asset('admin/images/icon/logo.png')}}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                @include('siswas.layout.sidebar-menu')
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->