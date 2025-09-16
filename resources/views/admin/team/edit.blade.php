@extends('admin.layouts.app')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-warning text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-edit me-2"></i> تعديل بيانات العضو</h5>
            <a href="{{ route('admin.team.index') }}" class="btn btn-light btn-sm">
                <i class="fas fa-arrow-left"></i> رجوع
            </a>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.team.update', $member->id) }}" method="POST" enctype="multipart/form-data"
                class="row g-3">
                @csrf
                @method('PUT')

                <!-- الاسم -->
                <div class="col-md-6">
                    <label for="name" class="form-label">الاسم</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $member->name) }}"
                        required>
                </div>

                <!-- الدور -->
                <div class="col-md-6">
                    <label for="role" class="form-label">الدور</label>
                    <input type="text" id="role" name="role" class="form-control" value="{{ old('role', $member->role) }}"
                        required>
                </div>

                <!-- الصورة -->
                <div class="col-md-12">
                    <label for="photo" class="form-label">الصورة</label>
                    <input type="file" id="photo" name="photo" class="form-control" accept="image/*">
                    <small class="text-muted">اترك الحقل فارغ إذا لم ترغب في تغيير الصورة</small>
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $member->photo) }}" width="100" class="rounded-circle">
                    </div>
                </div>

                <!-- زر الحفظ -->
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-warning text-white">
                        <i class="fas fa-save"></i> تحديث
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection