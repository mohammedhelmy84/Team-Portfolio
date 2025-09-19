@extends('admin.layouts.app')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-edit me-2"></i> تعديل المشروع</h5>
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

            <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data"
                class="row g-3">
                @csrf
                @method('PUT')

                <!-- العنوان -->
                <div class="col-md-6">
                    <label for="title" class="form-label">عنوان المشروع</label>
                    <input type="text" id="title" name="title" class="form-control"
                        value="{{ old('title', $project->title) }}" required>
                </div>

                <!-- الرابط -->
                <div class="col-md-6">
                    <label for="link" class="form-label">رابط المشروع</label>
                    <input type="url" id="link" name="link" class="form-control" value="{{ old('link', $project->link) }}">
                </div>

                <!-- الوصف -->
                <div class="col-md-12">
                    <label for="description" class="form-label">الوصف</label>
                    <textarea id="description" name="description" class="form-control" rows="4"
                        required>{{ old('description', $project->description) }}</textarea>
                </div>

                <!-- الصورة الحالية -->
                <div class="col-md-12">
                    <label class="form-label">الصورة الحالية</label><br>
                    <img src="{{ asset('storage/' . $project->photo) }}" width="120" class="rounded border">
                </div>

                <!-- تغيير الصورة -->
                <div class="col-md-12">
                    <label for="photo" class="form-label">تغيير الصورة (اختياري)</label>
                    <input type="file" id="photo" name="photo" class="form-control" accept="image/*">
                    <small class="text-muted">اترك الحقل فارغًا إذا كنت لا تريد تغيير الصورة</small>
                </div>

                <!-- زر الحفظ -->
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save"></i> تحديث
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection