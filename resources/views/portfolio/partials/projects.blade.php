<!-- resources/views/portfolio/partials/projects.blade.php -->
<section id="projects" class="py-5 bg-transparent">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold">مشاريع مختارة</h3>
            <p class="text-muted small">نماذج عمل توضح التخصصات والحلول</p>
        </div>

        <div class="row g-4">
            @forelse($projects as $project)
                <div class="col-md-4" data-aos="flip-left">
                    <div class="card card-glass p-3 h-100">
                        <img src="{{ asset('storage/' . $project->photo) }}" 
                             class="project-thumb mb-3" 
                             alt="{{ $project->title }}">

                        <h5 class="text-white">{{ $project->title }}</h5>
                        <p class="small text-white">{{ $project->description }}</p>
                        <div class="mt-2">
                            @if($project->link)
                                <a href="{{ $project->link }}" target="_blank" class="btn btn-outline-light btn-sm">
                                    عرض المشروع
                                </a>
                            @else
                                <button class="btn btn-outline-light btn-sm" disabled>
                                    لا يوجد رابط
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        لا يوجد مشاريع مضافة حتى الآن
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
