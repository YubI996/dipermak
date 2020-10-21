









<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{{ route('roles.index') }}"><i class="fa fa-edit"></i><span>Roles</span></a>
</li>

<li class="{{ Request::is('kotas*') ? 'active' : '' }}">
    <a href="{{ route('kotas.index') }}"><i class="fa fa-edit"></i><span>Kotas</span></a>
</li>


<li class="{{ Request::is('kecamatans*') ? 'active' : '' }}">
    <a href="{{ route('kecamatans.index') }}"><i class="fa fa-edit"></i><span>Kecamatans</span></a>
</li>


<li class="{{ Request::is('kelurahans*') ? 'active' : '' }}">
    <a href="{{ route('kelurahans.index') }}"><i class="fa fa-edit"></i><span>Kelurahans</span></a>
</li>

<li class="{{ Request::is('rts*') ? 'active' : '' }}">
    <a href="{{ route('rts.index') }}"><i class="fa fa-edit"></i><span>Rts</span></a>
</li>

<li class="{{ Request::is('jenKegs*') ? 'active' : '' }}">
    <a href="{{ route('jenKegs.index') }}"><i class="fa fa-edit"></i><span>Jen Kegs</span></a>
</li>



<li class="{{ Request::is('kegiatans*') ? 'active' : '' }}">
    <a href="{{ route('kegiatans.index') }}"><i class="fa fa-edit"></i><span>Kegiatans</span></a>
</li>

<li class="{{ Request::is('partisipasis*') ? 'active' : '' }}">
    <a href="{{ route('partisipasis.index') }}"><i class="fa fa-edit"></i><span>Partisipasis</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('dokumentasis*') ? 'active' : '' }}">
    <a href="{{ route('dokumentasis.index') }}"><i class="fa fa-edit"></i><span>Dokumentasis</span></a>
</li>

