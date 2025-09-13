<!-- resources/views/portfolio/partials/hero.blade.php -->
<header class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-left">
                <h1 class="display-5 fw-bold">
                    <span id="typewriter" class="typewriter"></span>
                </h1>
                <p class="lead mt-3">فريق إبداعي متكامل يجمع بين خبرة تطوير الواجهات الأمامية والخلفية وتطبيقات
                    الموبايل، لنحوّل أفكارك الرقمية إلى حلول مبتكرة وناجحة.</p>
                <div class="mt-4">
                    <a href="#projects" class="btn btn-accent btn-lg me-2">عرض المشاريع</a>
                    <a href="#contact" class="btn btn-outline-light btn-lg">اطلب عرض سعر</a>
                </div>

                <div class="mt-4 d-flex gap-3 small text-muted">
                    <div class="card card-glass p-3 text-white">
                        <strong>12+</strong><br>مشروع
                    </div>
                    <div class="card card-glass p-3 text-white">
                        <strong>8</strong><br>مطوّر
                    </div>
                    <div class="card card-glass p-3 text-white">
                        <strong>95%</strong><br>نسبة نجاح
                    </div>
                </div>
            </div>

            <div class="col-lg-6 text-center" data-aos="zoom-in">
                <div class="card card-glass p-4 shadow-sm">
                    <!-- <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?q=80&w=1400&auto=format&fit=crop&ixlib=rb-4.0.3"
                        class="img-fluid rounded-3" alt="web design project" /> -->

                    <img src="{{ asset('images/hero.jpg') }}" class="img-fluid rounded-3" alt="team">
                </div>
            </div>
        </div>
    </div>
</header>