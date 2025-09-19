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


    <!-- CONTACT MESSAGES Section -->
    <section id="contacts-section" class="mb-5">
        <h4 class="mb-3 text-secondary">الرسائل</h4>
        <div class="table-responsive">
            <table id="contactsTable" class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>الاسم</th>
                        <th>البريد</th>
                        <th>الرسالة</th>
                        <th>تاريخ</th>
                        <th>الحالة</th>
                        <th>إجراء</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $msg)
                        <tr>
                            <td>{{ $msg->name }}</td>
                            <td>{{ $msg->email }}</td>
                            <td>{{ Str::limit($msg->message, 40) }}</td>
                            <td>{{ $msg->created_at->format('Y-m-d') }}</td>
                            <td>
                                @if($msg->is_read)
                                    <span class="badge bg-success">مقروءة</span>
                                @else
                                    <span class="badge bg-danger">غير مقروءة</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.contacts.show', $msg->id) }}" class="btn btn-info btn-sm"> <i
                                        class="fas fa-eye"></i> عرض</a>
                                <form action="{{ route('admin.contacts.destroy', $msg->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> حذف</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>


@endsection