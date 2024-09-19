<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.admin_dashboard')}}">
                <i class="ti-shield menu-icon"></i>
                <span class="menu-title">DASHBOARD</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('pengajuan') }}">
                <i class="ti-user menu-icon"></i>
                <span class="menu-title">Pengajuan Pinjaman</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin') }}">
                <i class="ti-user menu-icon"></i>
                <span class="menu-title">Berkas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user')}}">
                <i class="ti-user menu-icon"></i>
                <span class="menu-title">Kelola User</span>
            </a>
        </li>
    </ul>
</nav>
