<!-- resources/views/portfolio/partials/projects.blade.php -->
<section id="projects" class="py-5 bg-transparent">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold">مشاريع مختارة</h3>
            <p class="text-muted small">نماذج عمل توضح التخصصات والحلول</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4" data-aos="flip-left">
                <div class="card card-glass p-3 h-100">
                    <img src="{{ asset('images/cms.jpg') }}" class="project-thumb mb-3" alt="proj">

                    <h5 class="text-white">نظام إدارة محتوى</h5>
                    <p class="small text-white">Laravel + Vue - لوحة تحكم متقدمة ونظام صلاحيات.</p>
                    <div class="mt-2">
                        <button class="btn btn-outline-light btn-sm" data-bs-toggle="modal"
                            data-bs-target="#projModal">عرض التفاصيل</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4" data-aos="flip-left" data-aos-delay="80">
                <div class="card card-glass p-3 h-100">
                    <img src="{{ asset('images/ecommerce.jpg') }}" class="project-thumb mb-3" alt="proj">
                    <h5 class="text-white">تطبيق تجارة إلكترونية</h5>
                    <p class="small text-white">React + Node - تجربة مستخدم سلسة ودعم بوابات دفع.</p>
                    <div class="mt-2">
                        <button class="btn btn-outline-light btn-sm" data-bs-toggle="modal"
                            data-bs-target="#projModal">عرض التفاصيل</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4" data-aos="flip-left" data-aos-delay="160">
                <div class="card card-glass p-3 h-100">
                    <img src="{{ asset('images/edu.jpg') }}" class="project-thumb mb-3" alt="proj">
                    <h5 class="text-white">بوابة تعليمية</h5>
                    <p class="small text-white">MERN Stack - موديولات تعليمية وامتحانات إلكترونية.</p>
                    <div class="mt-2">
                        <button class="btn btn-outline-light btn-sm" data-bs-toggle="modal"
                            data-bs-target="#projModal">عرض التفاصيل</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>