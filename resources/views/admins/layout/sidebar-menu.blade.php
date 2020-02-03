<li class="nav-item {{ Route::currentRouteName() == 'admin-home' ? 'active':'' }}">
    <a href="{{route('admin-home')}}"  class="nav-link">
        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
</li>
<li class="nav-item {{ Route::currentRouteName() == 'admin-users-home' ? 'active':'' }}">
    <a href="{{route('admin-users-home')}}"  class="nav-link">
        <i class="fas fa-users"></i>Users</a>
</li>
<li class="nav-item {{ Route::currentRouteName() == 'admin-absensi-home' ? 'active':'' }}">
    <a href="{{route('admin-absensi-home')}}"  class="nav-link">
        <i class="fas fa-table"></i>Absensi</a>
</li>
<li class="nav-item {{ Route::currentRouteName() == 'admin-soal-home' ? 'active':'' }}">
    <a href="{{route('admin-soal-home')}}"  class="nav-link">
        <i class="fas fa-check-square"></i>Soal</a>
</li>
<li class="nav-item {{ Route::currentRouteName() == 'admin-nilai-home' ? 'active':'' }}">
    <a href="{{route('admin-nilai-home')}}"  class="nav-link">
        <i class="fas fa-chart-bar"></i>Nilai</a>
</li>
<li class="nav-item {{ Route::currentRouteName() == 'admin-home-home' ? 'active':'' }}">
    <a href="{{route('admin-home-home')}}"  class="nav-link">
        <i class="fas fa-cogs"></i>Home Settings</a>
</li>
<li class="nav-item {{ Route::currentRouteName() == 'admin-blog-home' ? 'active':'' }}">
    <a href="{{route('admin-blog-home')}}"  class="nav-link">
        <i class="fas fa-paragraph"></i>Blog</a>
</li>