<li class="nav-item {{ Route::currentRouteName() == 'operator-home' ? 'active':'' }}">
    <a href="{{route('operator-home')}}"  class="nav-link">
        <i class="fas fa-tachometer-alt"></i>Dasbor</a>
</li>
<li class="nav-item {{ Route::currentRouteName() == 'operator-siswa' ? 'active':'' }}">
    <a href="{{route('operator-siswa')}}"  class="nav-link">
        <i class="fas fa-users"></i>Daftar Siswa</a>
</li>
<li class="nav-item {{ Route::currentRouteName() == 'operator-absensi-home' ? 'active':'' }}">
    <a href="{{route('operator-absensi-home')}}"  class="nav-link">
        <i class="fas fa-table"></i>Absensi</a>
</li>
<li class="nav-item {{ Route::currentRouteName() == 'operator-soal-home' ? 'active':'' }}">
    <a href="{{route('operator-soal-home')}}"  class="nav-link">
        <i class="fas fa-check-square"></i>Soal</a>
</li>
<li class="nav-item {{ Route::currentRouteName() == 'operator-nilai-home' ? 'active':'' }}">
    <a href="{{route('operator-nilai-home')}}"  class="nav-link">
        <i class="fas fa-chart-bar"></i>Nilai</a>
</li>