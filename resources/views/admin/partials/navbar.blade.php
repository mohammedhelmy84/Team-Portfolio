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
                    <a class="nav-link position-relative" href="#" data-bs-toggle="dropdown">
                        <i class="fas fa-bell"></i>
                        @if($contacts->count())
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $contacts->count() }}
                            </span>
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        @forelse($contacts->take(5) as $msg)
                            <li class="dropdown-item">
                                <strong>{{ $msg->name }}</strong>: {{ Str::limit($msg->message, 30) }}
                                <small class="text-muted d-block">{{ $msg->created_at->diffForHumans() }}</small>
                            </li>
                        @empty
                            <li class="dropdown-item text-center">لا توجد رسائل</li>
                        @endforelse
                    </ul>
                </li>
                <!-- Website -->
                <li class="nav-item">
                    <a href="{{ route('index') }}" target="_blank" class="btn btn-outline-light btn-sm me-2">الانتقال للموقع</a>
                </li>
                <!-- Logout -->
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm">تسجيل خروج</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>