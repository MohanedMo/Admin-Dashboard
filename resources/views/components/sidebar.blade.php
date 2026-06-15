<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon">
            <i class="bi bi-buildings"></i>
        </div>
        <div>
            <h5>Mohaned Dashboard</h5>
            <small>Admin Portal</small>
        </div>
    </div>

    <nav class="sidebar-nav">
        <div class="nav-label">Overview</div>
        <div class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2-fill"></i>
                Dashboard
            </a>
        </div>
        <div class="nav-item">
            <a href="{{ route('properties') }}" class="nav-link {{ request()->routeIs('properties') || request()->routeIs('property.details') ? 'active' : '' }}">
                <i class="bi bi-house-door-fill"></i>
                Properties
            </a>
        </div>
    </nav>

    <div class="sidebar-footer">
        <div class="user-info">
            <div class="user-avatar">MA</div>
            <div>
                <div class="user-name">Mohaned Admin</div>
                <div class="user-role">Super Administrator</div>
            </div>
        </div>
    </div>
</aside>
