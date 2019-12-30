<li class="">
    <a href="">
        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
</li>
<li class="{{ Route::currentRouteName() == 'admin-users-home' ? 'active':'' }}">
    <a href="{{route('admin-users-home')}}">
        <i class="fas fa-users"></i>Users</a>
</li>
<li class="{{ Route::currentRouteName() == 'admin-absensi-home' ? 'active':'' }}">
    <a href="{{route('admin-absensi-home')}}">
        <i class="fas fa-table"></i>Absensi</a>
</li>
<li class="{{ Route::currentRouteName() == 'admin-soal-home' ? 'active':'' }}">
    <a href="{{route('admin-soal-home')}}">
        <i class="fas fa-check-square"></i>Soal</a>
</li>
<li>
    <a href="form.html">
        <i class="fas fa-chart-bar"></i>Nilai</a>
</li>