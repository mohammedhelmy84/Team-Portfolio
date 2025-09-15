@extends('layouts.app')

@section('content')
    <style>
        /* كروت شفافة مع أنيميشن Fade-in عند الدخول */
        .card-fade-in {
            background-color: rgba(255, 255, 255, 0.1) !important;
            backdrop-filter: blur(10px);
            animation: fadeInUp 0.8s ease forwards;
            opacity: 0;
        }

        @keyframes fadeInUp {
            0% {
                transform: translateY(20px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
    <div class="container-fluid p-0">

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
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
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

        <!-- زر إخفاء/إظهار Sidebar -->
        <button id="toggleSidebar" class="btn btn-primary position-fixed shadow-sm p-1"
            style="top:70px; right:0; z-index:1050; width:35px; height:35px; font-size:18px;">
            <i class="fas fa-angle-left" id="sidebarIcon"></i>
        </button>



        <!-- Sidebar ثابت -->
        <div id="sidebar" class="bg-light vh-100 p-3 shadow-sm position-fixed"
            style="width:220px; top:56px; right:0; transition: all 0.3s; overflow:auto;">

            <!-- إضافة مساحة من الأعلى للقائمة -->
            <div class="list-group mt-5">
                <a href="#team-section" class="list-group-item list-group-item-action">أعضاء الفريق</a>
                <a href="#projects-section" class="list-group-item list-group-item-action">المشاريع</a>
                <a href="#services-section" class="list-group-item list-group-item-action">الخدمات</a>
                <a href="#contacts-section" class="list-group-item list-group-item-action">رسائل التواصل</a>
            </div>
        </div>

        <!-- Main Content -->
        <div id="main-content" style="margin-right:220px; padding:20px; margin-top:56px; transition: margin 0.3s;">

            <h2 class="mb-4 text-center text-primary">لوحة تحكم البورتفوليو</h2>

            <!-- Cards معلومات سريعة -->
            <!-- Cards معلومات سريعة -->
            <div class="row mb-4">
                <div class="col-sm-6 col-md-3 mb-3">
                    <div class="card text-white bg-primary shadow-sm card-fade-in">
                        <div class="card-body text-center">
                            <i class="fas fa-users fa-2x mb-2"></i>
                            <h5 class="card-title">أعضاء الفريق</h5>
                            <p class="card-text fs-4">{{ $team->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 mb-3">
                    <div class="card text-white bg-success shadow-sm card-fade-in">
                        <div class="card-body text-center">
                            <i class="fas fa-project-diagram fa-2x mb-2"></i>
                            <h5 class="card-title">المشاريع</h5>
                            <p class="card-text fs-4">{{ $projects->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 mb-3">
                    <div class="card text-white bg-warning shadow-sm card-fade-in">
                        <div class="card-body text-center">
                            <i class="fas fa-cogs fa-2x mb-2"></i>
                            <h5 class="card-title">الخدمات</h5>
                            <p class="card-text fs-4">{{ $services->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 mb-3">
                    <div class="card text-white bg-danger shadow-sm card-fade-in">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope fa-2x mb-2"></i>
                            <h5 class="card-title">رسائل التواصل</h5>
                            <p class="card-text fs-4">{{ $contacts->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif

            <!-- TEAM Section -->
            <section id="team-section" class="mb-5">
                <h4 class="mb-3 text-secondary">أعضاء الفريق</h4>
                <div class="card shadow-sm p-3 mb-3">
                    <!-- form إضافة عضو -->
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>الصورة</th>
                                <th>الاسم</th>
                                <th>الدور</th>
                                <th>إجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($team as $member)
                                <tr>
                                    <td><img src="{{ asset('storage/' . $member->photo) }}" width="60" class="rounded-circle">
                                    </td>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->role }}</td>
                                    <td>
                                        <form action="{{ route('admin.team.delete', $member->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- PROJECTS Section -->
            <section id="projects-section" class="mb-5">
                <h4 class="mb-3 text-secondary">المشاريع</h4>
                <div class="card shadow-sm p-3 mb-3">
                    <!-- form إضافة مشروع -->
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>الصورة</th>
                                <th>العنوان</th>
                                <th>الوصف</th>
                                <th>الرابط</th>
                                <th>إجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td><img src="{{ asset('storage/' . $project->image) }}" width="60" class="rounded"></td>
                                    <td>{{ $project->title }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td>{{ $project->link }}</td>
                                    <td>
                                        <form action="{{ route('admin.projects.delete', $project->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- SERVICES Section -->
            <section id="services-section" class="mb-5">
                <h4 class="mb-3 text-secondary">الخدمات</h4>
                <div class="card shadow-sm p-3 mb-3">
                    <!-- form إضافة خدمة -->
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>الأيقونة</th>
                                <th>العنوان</th>
                                <th>الوصف</th>
                                <th>إجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td><i class="{{ $service->icon }}"></i></td>
                                    <td>{{ $service->title }}</td>
                                    <td>{{ $service->description }}</td>
                                    <td>
                                        <form action="{{ route('admin.services.delete', $service->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- CONTACT MESSAGES Section -->
            <section id="contacts-section" class="mb-5">
                <h4 class="mb-3 text-secondary">رسائل التواصل</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>الاسم</th>
                                <th>البريد</th>
                                <th>الرسالة</th>
                                <th>تاريخ</th>
                                <th>إجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $msg)
                                <tr>
                                    <td>{{ $msg->name }}</td>
                                    <td>{{ $msg->email }}</td>
                                    <td>{{ $msg->message }}</td>
                                    <td>{{ $msg->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <form action="{{ route('admin.contacts.delete', $msg->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>

        </div>
    </div>

    <script>
        const toggleBtn = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        const sidebarIcon = document.getElementById('sidebarIcon');

        toggleBtn.addEventListener('click', () => {
            if (sidebar.style.right === '-220px') {
                sidebar.style.right = '0';
                mainContent.style.marginRight = '220px';
                sidebarIcon.classList.remove('fa-angle-right');
                sidebarIcon.classList.add('fa-angle-left'); // سهم يشير لليسار عند فتح القائمة
            } else {
                sidebar.style.right = '-220px';
                mainContent.style.marginRight = '0';
                sidebarIcon.classList.remove('fa-angle-left');
                sidebarIcon.classList.add('fa-angle-right'); // سهم يشير لليمين عند إخفاء القائمة
            }
        });
    </script>
@endsection