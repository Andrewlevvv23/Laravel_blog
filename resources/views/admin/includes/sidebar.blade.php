<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <div class="sidebar">
        <ul class="nav nav-pills nav-sidebar flex-column">
            <li class="mt-3 nav-item">
                <a href="{{ route('admin') }}" class="nav-link">
                    <i class="nav-icon fa fa-home"></i>
                    <p>
                        ГОЛОВНА
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        КОРИСТУВАЧІ
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('posts.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-portrait"></i>
                    <p>
                        ПОСТИ
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-th-list"></i>
                    <p>
                        КАТЕГОРІЇ
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('tags.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-tags"></i>
                    <p>
                        ТЕГИ
                    </p>
                </a>
            </li>


        </ul>

    </div>

</aside>
