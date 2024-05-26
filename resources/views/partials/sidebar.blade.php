<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Apsara<span><b>HOTEL</b></span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Fields</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#customerPages" role="button"
                    aria-expanded="false" aria-controls="customerPages">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Manage Customer</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="customerPages">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('customertype.index') }}" class="nav-link {{ request()->routeIs('customertype.*') ? 'active' : '' }}">Customer Type</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('customer.index') }}" class="nav-link {{ request()->routeIs('customer.*') ? 'active' : '' }}">Customer Table</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
