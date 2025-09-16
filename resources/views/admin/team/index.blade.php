@extends('admin.layouts.app')
@section('content')
    <!-- TEAM Section -->
    <section id="team-section" class="mb-5">
        <h4 class="mb-3 text-secondary text-center">أعضاء الفريق</h4>

        <!-- زر إضافة عضو جديد -->
        <a href="{{ route('admin.team.create') }}" class="btn btn-primary mb-3 shadow-sm">
            ➕ إضافة عضو جديد
        </a>

        <div class="card shadow-sm p-3 mb-3">
            <!-- form إضافة عضو -->
        </div>
        @include('alerts.messages')

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
                            <td><img src="{{ asset('storage/' . $member->photo) }}" width="60" class="rounded-circle"></td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->role }}</td>
                            <td>
                                <a href="{{ route('admin.team.edit', $member->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> تعديل
                                </a>
                                <form action="{{ route('admin.team.delete', $member->id) }}" method="POST"
                                    style="display:inline-block;">
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