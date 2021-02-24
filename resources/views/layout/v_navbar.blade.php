<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
    <li class="nav-item">
        <a href="/" class="{{ request()->is('/') ? 'nav-link active' : 'nav-link' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p class="text">Dashboard</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/siswa" class="{{ request()->is('siswa') ? 'nav-link active' : 'nav-link' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p class="text">Siswa</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/guru" class="{{ request()->is('guru') ? 'nav-link active' : 'nav-link' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p class="text">Guru</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/user" class="{{ request()->is('user') ? 'nav-link active' : 'nav-link' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p class="text">User</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>
                Level 1
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Level 2</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Level 2</p>
                </a>
            </li>
        </ul>
    </li>
    {{-- <li class="nav-header">LABELS</li> --}}
</ul>
