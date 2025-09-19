@extends('admin.layouts.app')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-cogs me-2"></i> الخدمات</h5>
            <a href="{{ route('admin.services.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> إضافة خدمة
            </a>
        </div>

        <div class="card-body">
            @include('alerts.messages')

            <div class="table-responsive">
                <table id="servicesTable" class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>الأيقونة</th>
                            <th>العنوان</th>
                            <th>الوصف</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($services as $service)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <i class="{{ $service->icon }} fa-lg text-primary"></i>
                                </td>
                                <td>{{ $service->title }}</td>
                                <td>{{ Str::limit($service->description, 50) }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.services.edit', $service->id) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> تعديل
                                        </a>
                                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST"
                                            onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> حذف
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection