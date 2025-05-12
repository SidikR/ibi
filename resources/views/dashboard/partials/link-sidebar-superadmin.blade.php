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

    <li class="nav-item <?php echo isKeywordActive(['users']) ? 'active' : ''; ?>">
        <a href="{{ route('dashboard.' . roleName() . '.users.index') }}" class="collapsed">
            <i class="fas fa-home"></i>
            <p>Manajemen User</p>
        </a>
    </li>
    <li class="nav-item <?php echo isKeywordActive(['roles']) ? 'active' : ''; ?>">
        <a href="{{ route('dashboard.' . roleName() . '.roles.index') }}" class="collapsed">
            <i class="fas fa-home"></i>
            <p>Manajemen Role</p>
        </a>
    </li>
    <li class="nav-item <?php echo isKeywordActive(['rantings']) ? 'active' : ''; ?>">
        <a href="{{ route('dashboard.' . roleName() . '.rantings.index') }}" class="collapsed">
            <i class="fas fa-home"></i>
            <p>Manajemen Ranting</p>
        </a>
    </li>

</ul>
