@extends('admin.layouts.app')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-folder me-2"></i> المشاريع</h5>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> إضافة مشروع
            </a>
        </div>

        <div class="card-body">
            @include('alerts.messages')
            <div class="table-responsive">
                <table id="ProjectsTable" class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>العنوان</th>
                            <th>الوصف</th>
                            <th>الرابط</th>
                            <th>الصورة</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($projects as $project)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $project->title }}</td>
                                <td>{{ Str::limit($project->description, 50) }}</td>
                                <td>
                                    <a href="{{ $project->link }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-external-link-alt"></i> زيارة
                                    </a>
                                </td>
                                <td>
                                    <img src="{{ asset('storage/' . $project->photo) }}" width="80" class="rounded border">
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.projects.edit', $project->id) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> تعديل
                                        </a>
                                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
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