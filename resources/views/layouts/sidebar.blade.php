<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('pegawai.pegawai_dashboard')}}">
                <i class="ti-shield menu-icon"></i>
                <span class="menu-title">DASHBOARD</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('pegawaiPengajuan')}}">
                <i class="ti-user menu-icon"></i>
                <span class="menu-title">Pengajuan Pinjaman</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('pegawai')}}">
                <i class="ti-user menu-icon"></i>
                <span class="menu-title">Berkas Nasabah</span>
            </a>
        </li>
    </ul>
</nav>