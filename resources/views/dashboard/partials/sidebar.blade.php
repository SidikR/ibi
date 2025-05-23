<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="#" class="logo">
                <img loading="lazy" src="{{ asset('assets/images/ibi_front.png') }}" alt="navbar brand" class="navbar-brand"
                    height="35" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>

    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            @if (roleName() === 'superadmin')
                @include('dashboard.partials.link-sidebar-superadmin')
            @elseif(roleName() === 'petugas')
                @include('dashboard.partials.link-sidebar-petugas')
            @elseif(roleName() === 'anggota')
                @include('dashboard.partials.link-sidebar-anggota')
            @endif
        </div>
    </div>

</div>
