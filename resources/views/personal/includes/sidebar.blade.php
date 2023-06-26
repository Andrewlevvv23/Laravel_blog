<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <div class="sidebar">
        <ul class="nav nav-pills nav-sidebar flex-column">

            <li class="mt-3 nav-item">
                <a href="{{ route('personal') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        ГОЛОВНА
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('liked.index') }}" class="nav-link">
                    <i class="nav-icon far fa-heart"></i>
                    <p>
                        ВПОДОБАНІ ПОСТИ
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('comments.index') }}" class="nav-link">
                    <i class="nav-icon far fa-comment"></i>
                    <p>
                        КОМЕНТАРІ
                    </p>
                </a>
            </li>


        </ul>

    </div>

</aside>
