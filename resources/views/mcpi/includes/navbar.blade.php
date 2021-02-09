<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <section>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <span class="icon-wrapper text-center">
                            <i class="fas fa-home"></i>
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('events.index') }}">
                        <span class="icon-wrapper text-center">
                            <i class="fas fa-calendar-alt"></i>
                        </span>
                        <span>Events</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('places.index') }}">
                        <span class="icon-wrapper text-center">
                            <i class="fas fa-map-marked"></i>
                        </span>
                        <span>Places</span>
                    </a>
                </li>
            </ul>
        </section>


            <section>
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Admin</span>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">
                            <span class="icon-wrapper text-center">
                                <i class="fas fa-user"></i>
                            </span>
                            <span>Users</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('roles.index') }}">
                            <span class="icon-wrapper text-center">
                                <i class="fas fa-user-lock"></i>
                            </span>
                            <span>Roles</span>
                        </a>
                    </li>
                </ul>
            </section>

    </div>
</nav>
