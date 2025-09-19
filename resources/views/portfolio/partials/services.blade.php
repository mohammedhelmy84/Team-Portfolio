<!-- resources/views/portfolio/partials/services.blade.php -->
<section id="services" class="py-5">
    <div class="container">
        <div class="text-center mb-4">
            <h3 class="fw-bold text-white">الخدمات</h3>
            <p class="text-white small">نقدّم حلول متكاملة من التصميم إلى الإطلاق والصيانة</p>
        </div>

        <div class="row g-4">
            @forelse ($services as $index => $service)
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $index * 80 }}">
                    <div class="card card-glass p-4 h-100 text-center">
                        <i class="{{ $service->icon }} text-warning"></i>
                        <h5 class="mt-3 text-white">{{ $service->title }}</h5>
                        <p class="small text-white">{{ $service->description }}</p>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">
                    <i class="fas fa-info-circle"></i> لا توجد خدمات مضافة حالياً
                </div>
            @endforelse
        </div>
    </div>
</section>