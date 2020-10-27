
<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{{ route('roles.index') }}"><i class="fa fa-edit"></i><span>Roles</span></a>
</li>

<li class="{{ Request::is('kotas*') ? 'active' : '' }}">
    <a href="{{ route('kotas.index') }}"><i class="fa fa-edit"></i><span>Kota</span></a>
</li>


<li class="{{ Request::is('kecamatans*') ? 'active' : '' }}">
    <a href="{{ route('kecamatans.index') }}"><i class="fa fa-edit"></i><span>Kecamatan</span></a>
</li>


<li class="{{ Request::is('kelurahans*') ? 'active' : '' }}">
    <a href="{{ route('kelurahans.index') }}"><i class="fa fa-edit"></i><span>Kelurahan</span></a>
</li>

<li class="{{ Request::is('rts*') ? 'active' : '' }}">
    <a href="{{ route('rts.index') }}"><i class="fa fa-edit"></i><span>RT</span></a>
</li>

<li class="{{ Request::is('jenKegs*') ? 'active' : '' }}">
    <a href="{{ route('jenKegs.index') }}"><i class="fa fa-edit"></i><span>Jenis Kegiatan</span></a>
</li>



<li class="{{ Request::is('kegiatans*') ? 'active' : '' }}">
    <a href="{{ route('kegiatans.index') }}"><i class="fa fa-edit"></i><span>Kegiatan</span></a>
</li>

<li class="{{ Request::is('partisipasis*') ? 'active' : '' }}">
    <a href="{{ route('partisipasis.index') }}"><i class="fa fa-edit"></i><span>Partisipasi</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('dokumentasis*') ? 'active' : '' }}">
    <a href="{{ route('dokumentasis.index') }}"><i class="fa fa-edit"></i><span>Dokumentasi</span></a>
</li>

