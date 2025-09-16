@extends('admin.layouts.app')

@section('content')
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-user-plus me-2"></i> إضافة عضو جديد</h5>
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

                <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                    @csrf

                    <!-- الاسم -->
                    <div class="col-md-6">
                        <label for="name" class="form-label">الاسم</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}"  placeholder="ادخل اسم العضو" required>
                    </div>

                    <!-- الدور -->
                    <div class="col-md-6">
                        <label for="role" class="form-label">الدور</label>
                        <input type="text" id="role" name="role" class="form-control" value="{{ old('role') }}"  placeholder="ادخل دور العضو" required>
                    </div>

                    <!-- الصورة -->
                    <div class="col-md-12">
                        <label for="photo" class="form-label">الصورة</label>
                        <input type="file" id="photo" name="photo" class="form-control" accept="image/*" required>
                        <small class="text-muted">يرجى رفع صورة مربعة (مثلاً 400x400)</small>
                    </div>

                    <!-- زر الحفظ -->
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> حفظ
                        </button>
                    </div>
                </form>
            </div>
        </div>
@endsection