@extends('admin.layouts.app')

@section('content')






    <h2 class="mb-4 text-center text-primary">لوحة تحكم البورتفوليو</h2>

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



@endsection