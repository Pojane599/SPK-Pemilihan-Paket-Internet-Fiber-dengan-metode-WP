<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-info bg-info elevation-4" style="position: fixed;">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <h5 id="date" class="d-block text-dark text-center text-bold"></h5>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link" style="color: black;">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p><strong>Dashboard</strong></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.kriteria') }}" class="nav-link" style="color: black;">
                        <i class="nav-icon fas fa-cubes"></i>
                        <p><strong>List Kriteria</strong></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.alternatif') }}" class="nav-link" style="color: black;">
                        <i class="nav-icon fas fa-stream"></i>
                        <p><strong>List Alternatif</strong></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.pembobotan') }}" class="nav-link" style="color: black;">
                        <i class="nav-icon fas fa-book"></i>
                        <p><strong>Pembobotan</strong></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.penilaian') }}" class="nav-link" style="color: black;">
                        <i class="nav-icon fas fa-faw fa-layer-group"></i>
                        <p><strong>Penilaian</strong></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.pesan', 'Belum Dibaca') }}" class="nav-link" style="color: black;">
                        <i class="nav-icon fas fa-faw fa-comment"></i>
                        <p><strong>Pesan</strong></p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>