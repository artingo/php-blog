<aside class="main-sidebar sidebar-dark-primary elevation-3 transparent">
    <a href="#" class="brand-link">
        <i class="fa-solid fa-suitcase"></i>
        <span class="brand-text">Travel Blog</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column">
                <li class="nav-item">
                    <a href="/posts" class="nav-link <?= $view=='posts/index'? 'bg-indigo' : ''?>">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>Posts</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/categories" class="nav-link <?= $view == 'categories'? 'bg-indigo' : ''?>">
                        <i class="nav-icon fas fa-shapes"></i>
                        <p>Categories</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/users" class="nav-link <?= $view == 'users'? 'bg-indigo' : ''?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
            </ul>
        </nav>

    </div>
</aside>
