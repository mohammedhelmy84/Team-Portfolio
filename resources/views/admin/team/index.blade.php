@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">

        <div class="card shadow-lg border-0 rounded-3">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-users me-2"></i> إدارة الفريق</h5>
                <a href="{{ route('admin.team.create') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-plus"></i> إضافة عضو جديد
                </a>
            </div>

            <div class="card-body">
                @include('alerts.messages')

                <div class="table-responsive">
                    <table id="TeamTable" class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>الصورة</th>
                                <th>الاسم</th>
                                <th>الدور</th>
                                <th class="text-center">إجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($team as $member)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/' . $member->photo) }}"
                                            class="rounded-circle border shadow-sm" width="60" height="60"
                                            style="object-fit: cover;">
                                    </td>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->role }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.team.edit', $member->id) }}"
                                            class="btn btn-warning btn-sm me-1">
                                            <i class="fas fa-edit"></i> تعديل
                                        </a>
                                        <form action="{{ route('admin.team.destroy', $member->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('هل أنت متأكد من الحذف؟')">
                                                <i class="fas fa-trash"></i> حذف
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                              
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
@endsection