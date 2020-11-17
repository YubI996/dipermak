
<li class="{{ Request::is('dokumentasis*') ? 'active' : '' }}">
    <a href="{{ route('dokumentasis.index') }}"><i class="fa fa-edit"></i><span>Dokumentasi</span></a>
</li>

<li class="{{ Request::is('kegiatans*') ? 'active' : '' }}">
    <a href="{{ route('kegiatans.index') }}"><i class="fa fa-edit"></i><span>Kegiatans</span></a>
</li>

<li class="{{ Request::is('partisipasis*') ? 'active' : '' }}">
    <a href="{{ route('partisipasis.index') }}"><i class="fa fa-edit"></i><span>Partisipasis</span></a>
</li>

