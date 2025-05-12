<ul class="nav nav-secondary">

    <li class="nav-item {{ request()->is('dashboard/' . roleName()) ? 'active' : '' }}">
        <a href="{{ route('dashboard.' . roleName() . '.index') }}" class="collapsed">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
        </a>
    </li>

    <li class="nav-section">
        <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">Kelola Data</h4>
    </li>

    <li class="nav-item <?php echo isKeywordActive(['data_anggota']) ? 'active' : ''; ?>">
        <a href="{{ route('dashboard.' . roleName() . '.data_anggota.index') }}" class="collapsed">
            <i class="fas fa-home"></i>
            <p>Data Anggota</p>
        </a>
    </li>

    <li class="nav-section">
        <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">Data Saya</h4>
    </li>

    <li class="nav-item <?php echo isKeywordActive(['data-personal']) ? 'active' : ''; ?>">
        <a href="{{ route('dashboard.' . roleName() . '.data-personal.edit') }}" class="collapsed">
            <i class="fas fa-home"></i>
            <p>Data Personal</p>
        </a>
    </li>
    <li class="nav-item <?php echo isKeywordActive(['kependudukan']) ? 'active' : ''; ?>">
        <a href="{{ route('dashboard.' . roleName() . '.kependudukan.edit') }}" class="collapsed">
            <i class="fas fa-home"></i>
            <p>Kependudukan</p>
        </a>
    </li>
    <li class="nav-item <?php echo isKeywordActive(['pekerjaan']) ? 'active' : ''; ?>">
        <a href="{{ route('dashboard.' . roleName() . '.pekerjaan.edit') }}" class="collapsed">
            <i class="fas fa-home"></i>
            <p>Pekerjaan</p>
        </a>
    </li>
    <li class="nav-item <?php echo isKeywordActive(['perizinan']) ? 'active' : ''; ?>">
        <a href="{{ route('dashboard.' . roleName() . '.perizinan.edit') }}" class="collapsed">
            <i class="fas fa-home"></i>
            <p>Perizinan</p>
        </a>
    </li>
    <li class="nav-item <?php echo isKeywordActive(['pendidikan']) ? 'active' : ''; ?>">
        <a href="{{ route('dashboard.' . roleName() . '.pendidikan.index') }}" class="collapsed">
            <i class="fas fa-home"></i>
            <p>Pendidikan</p>
        </a>
    </li>
    <li class="nav-item <?php echo isKeywordActive(['pelatihan']) ? 'active' : ''; ?>">
        <a href="{{ route('dashboard.' . roleName() . '.pelatihan.index') }}" class="collapsed">
            <i class="fas fa-home"></i>
            <p>Pelatihan</p>
        </a>
    </li>

</ul>
