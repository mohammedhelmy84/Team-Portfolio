<!-- resources/views/portfolio/partials/team.blade.php -->
<section id="team" class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold">الفريق</h3>
            <p class="text-muted small">تعرف على أعضاء الفريق ومهاراتهم</p>
        </div>

        <div class="row g-4">
            @if($team->count() > 0)
                @foreach($team as $member)
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="50">
                        <div class="card card-glass p-4 h-100 team-card">
                            <div class="d-flex align-items-center gap-3">
                                <img src="{{ asset('storage/' . $member->photo) }}" class="img-fluid rounded-circle"
                                    alt="member photo" width="80" height="80" />
                                <div>
                                    <h5 class="mb-0 text-white">{{ $member->name }}</h5>
                                    <small class="text-warning">{{ $member->role }}</small>
                                    <div class="mt-2">
                                        <span class="badge bg-transparent border">Laravel</span>
                                        <span class="badge bg-transparent border">PHP</span>
                                        <span class="badge bg-transparent border">MySQL</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="alert alert-warning text-center shadow-sm">
                        🚀 لا يوجد أعضاء فريق حالياً، يمكنك إضافة أعضاء من لوحة التحكم.
                    </div>
                </div>
            @endif
        </div>

    </div>
</section>