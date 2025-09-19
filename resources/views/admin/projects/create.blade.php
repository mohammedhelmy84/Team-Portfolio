@extends('admin.layouts.app')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-folder-plus me-2"></i> إضافة مشروع جديد</h5>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-light btn-sm">
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

            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf

                <!-- العنوان -->
                <div class="col-md-6">
                    <label for="title" class="form-label">عنوان المشروع</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
                </div>

                <!-- الرابط -->
                <div class="col-md-6">
                    <label for="link" class="form-label">رابط المشروع</label>
                    <input type="url" id="link" name="link" class="form-control" value="{{ old('link') }}">
                </div>

                <!-- الوصف -->
                <div class="col-md-12">
                    <label for="description" class="form-label">الوصف</label>
                    <textarea id="description" name="description" class="form-control" rows="4"
                        required>{{ old('description') }}</textarea>
                </div>

                <!-- الصورة -->
                <div class="col-md-12">
                    <label for="photo" class="form-label">الصورة</label>
                    <input type="file" id="photo" name="photo" class="form-control" accept="image/*" required>
                    <small class="text-muted">يرجى رفع صورة مناسبة لعرض المشروع</small>
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