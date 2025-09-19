<!-- Navbar أعلى الصفحة -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">لوحة التحكم</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTop">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTop">
            <ul class="navbar-nav ms-auto d-flex align-items-center">
                <!-- Notifications -->
                <li class="nav-item dropdown me-3">
                    <a id="notificationsDropdown" class="nav-link position-relative" href="#" data-bs-toggle="dropdown">
                        <i class="fas fa-bell"></i>
                        @if($unreadCount)
                            <span id="notificationBadge"
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $unreadCount }}
                            </span>
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" id="notificationsMenu">
                        @forelse($unreadContacts as $msg)
                            <li class="dropdown-item">
                                <strong>{{ $msg->name }}</strong>: {{ Str::limit($msg->message, 30) }}
                                <small class="text-muted d-block">{{ $msg->created_at->diffForHumans() }}</small>
                            </li>
                        @empty
                            <li class="dropdown-item text-center">لا توجد رسائل جديدة</li>
                        @endforelse
                    </ul>
                </li>


                <!-- Actions -->
                <ul class="navbar-nav d-flex flex-column flex-sm-row">
                    <!-- Website -->
                    <li class="nav-item me-sm-2 mb-2 mb-sm-0">
                        <a href="{{ route('index') }}" target="_blank"
                            class="btn btn-outline-light btn-sm w-100 w-sm-auto">
                            الانتقال للموقع
                        </a>
                    </li>

                    <!-- Logout -->
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline w-100 w-sm-auto">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm w-100 w-sm-auto">
                                تسجيل خروج
                            </button>
                        </form>
                    </li>
                </ul>

            </ul>
        </div>
    </div>
</nav>