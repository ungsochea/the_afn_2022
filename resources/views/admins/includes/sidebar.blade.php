<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard.index') }}" class="sidebar-brand">
        Noble<span>UI</span>
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
        <li class="nav-item {{ (request()->routeIs('admin.dashboard.index')) ? 'active':'' }}">
            <a href="{{ route('admin.dashboard.index') }}" class="nav-link">
            <i class="fa-solid fa-gauge link-icon"></i>
            <span class="link-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ (request()->routeIs('admin.category.index')) ? 'active':'' }}">
            <a href="{{ route('admin.category.index') }}" class="nav-link">
            <i class="fa-solid fa-dice-d6 link-icon"></i>
            <span class="link-title">Category</span>
            </a>
        </li>
        <li class="nav-item {{ (request()->routeIs('admin.tag.index')) ? 'active':'' }}">
            <a href="{{ route('admin.tag.index') }}" class="nav-link">
            <i class="fa-solid fa-hashtag link-icon"></i>
            <span class="link-title">Tag</span>
            </a>
        </li>
        </ul>
    </div>
    </nav>
