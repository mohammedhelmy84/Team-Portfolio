@extends('admin.layouts.app')

@section('title', 'عرض الرسالة')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">📩 تفاصيل الرسالة</h5>
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-light btn-sm">
                    <i class="fas fa-arrow-left"></i> الرجوع للرسائل
                </a>
            </div>

            <div class="card-body">
                <div class="mb-3">
                    <label class="fw-bold">الاسم:</label>
                    <p class="form-control-plaintext">{{ $contact->name }}</p>
                </div>

                <div class="mb-3">
                    <label class="fw-bold">البريد الإلكتروني:</label>
                    <p class="form-control-plaintext">
                        <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                    </p>
                </div>

                <div class="mb-3">
                    <label class="fw-bold">تاريخ الإرسال:</label>
                    <p class="form-control-plaintext">{{ $contact->created_at->format('Y-m-d h:i A') }}</p>
                </div>

                <div class="mb-3">
                    <label class="fw-bold">الرسالة:</label>
                    <div class="p-3 border rounded bg-light">
                        {{ $contact->message }}
                    </div>
                </div>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST"
                    onsubmit="return confirm('هل أنت متأكد أنك تريد حذف هذه الرسالة؟');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash"></i> حذف الرسالة
                    </button>
                </form>

                <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
                    <i class="fas fa-list"></i> كل الرسائل
                </a>
            </div>
        </div>
    </div>
@endsection