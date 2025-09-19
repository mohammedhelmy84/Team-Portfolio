@extends('admin.layouts.app')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0"><i class="fas fa-envelope me-2"></i> الرسائل</h5>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table id="contactsTable" class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>البريد</th>
                            <th>الموضوع</th>
                            <th>الحالة</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($contacts as $contact)
                            <tr @class(['fw-bold' => !$contact->is_read])>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->message ?? '-' }}</td>
                                <td>
                                    @if($contact->is_read)
                                        <span class="badge bg-success">مقروء</span>
                                    @else
                                        <span class="badge bg-warning">غير مقروء</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.contacts.show', $contact->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> عرض
                                    </a>
                                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
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

            {{ $contacts->links() }}
        </div>
    </div>
@endsection