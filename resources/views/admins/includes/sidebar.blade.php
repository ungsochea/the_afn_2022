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
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
                  <i class="link-icon" data-feather="book"></i>
                  <span class="link-title">Post</span>
                  <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                  <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('admin.post.index') }}" class="nav-link {{ (request()->routeIs('admin.post.index')) ? 'active':'' }}">All Post</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.post.create') }}" class="nav-link {{ (request()->routeIs('admin.post.create')) ? 'active':'' }}">New Post</a>
                    </li>
                    <li class="nav-item">
                      <a href="/admin/post/delete" class="nav-link {{ (request()->is('/admin/post/delete')) ? 'active':'' }}">Deleted Post</a>
                    </li>
                  </ul>
                </div>
              </li>
        </ul>
    </div>
    </nav>
