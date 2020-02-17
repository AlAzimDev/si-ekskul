<li class="nav-item {{ Route::currentRouteName() == 'siswa-profile' ? 'active':'' }}">
    <a href="{{route('siswa-profile')}}"  class="nav-link">
        <i class="fas fa-user"></i>Profile</a>
</li>
<li class="nav-item {{ Route::currentRouteName() == 'siswa-absensi-nilai' ? 'active':'' }}">
    <a href="{{route('siswa-absensi-nilai')}}"  class="nav-link">
        <i class="fas fa-calendar-alt"></i>Absensi & Daftar Nilai</a>
</li>