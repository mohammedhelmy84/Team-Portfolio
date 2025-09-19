@extends('admin.layouts.app')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-edit me-2"></i> تعديل الخدمة</h5>
            <a href="{{ route('admin.services.index') }}" class="btn btn-light btn-sm">
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

            <form action="{{ route('admin.services.update', $service->id) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')

                <!-- العنوان -->
                <div class="col-md-6">
                    <label for="title" class="form-label">عنوان الخدمة</label>
                    <input type="text" id="title" name="title" class="form-control"
                           value="{{ old('title', $service->title) }}" required>
                </div>

                <!-- الوصف -->
                <div class="col-md-12">
                    <label for="description" class="form-label">الوصف</label>
                    <textarea id="description" name="description" class="form-control" rows="4"
                              required>{{ old('description', $service->description) }}</textarea>
                </div>

                <!-- الأيقونة -->
                <div class="col-md-6">
                    <label for="icon" class="form-label">أيقونة الخدمة (FontAwesome)</label>
                    <input type="text" id="icon" name="icon" class="form-control"
                           value="{{ old('icon', $service->icon) }}">
                    <small class="text-muted">مثال: fas fa-code</small>
                </div>

                <!-- زر الحفظ -->
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> تحديث
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
