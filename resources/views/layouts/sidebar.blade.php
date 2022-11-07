<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('icon.png') }}" alt="AE Online" class="brand-image bg-white img-circle">
        <span class="brand-text font-weight-light">AE Online</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu">

                @auth
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-house"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                @can('view-any', App\Models\Car::class)
                    <li class="nav-item">
                        <a href="{{ route('cars.index') }}" class="nav-link">
                            <i class="nav-icon fa-solid fa-car"></i>
                            <p>Veículos</p>
                        </a>
                    </li>
                @endcan

                @can('view-any', App\Models\Category::class)
                    <li class="nav-item">
                        <a href="{{ route('categories.index') }}" class="nav-link">
                            <i class="nav-icon fa-solid fa-car-bus"></i>
                            <p>Tipos de Veículos</p>
                        </a>
                    </li>
                @endcan

                @can('view-any', App\Models\Student::class)
                    <li class="nav-item">
                        <a href="{{ route('students.index') }}" class="nav-link">
                            <i class="nav-icon fa-solid fa-users"></i>
                            <p>Alunos</p>
                        </a>
                    </li>
                @endcan

                @can('view-any', App\Models\Instructor::class)
                    <li class="nav-item">
                        <a href="{{ route('instructors.index') }}" class="nav-link">
                            <i class="nav-icon fa-solid fa-person-chalkboard"></i>
                            <p>Instrutores</p>
                        </a>
                    </li>
                @endcan
                @can('view-any', App\Models\Progress::class)
                    <li class="nav-item">
                        <a href="{{ route('progresses.index') }}" class="nav-link">
                            <i class="nav-icon fa-solid fa-bars-progress"></i>
                            <p>Progresso das Aulas</p>
                        </a>
                    </li>
                @endcan

                @endauth

                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                        <p>{{ __('Logout') }}</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endauth
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
