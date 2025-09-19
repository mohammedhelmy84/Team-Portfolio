@if(session('success'))
    <div id="alert-success" class="alert alert-success alert-dismissible fade show text-center shadow-sm msg" role="alert">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div id="alert-error" class="alert alert-danger alert-dismissible fade show text-center shadow-sm msg" role="alert">
        <i class="fas fa-times-circle me-2"></i> {{ session('error') }}
    </div>
@endif

@if(session('warning'))
    <div id="alert-warning" class="alert alert-warning alert-dismissible fade show text-center shadow-sm msg" role="alert">
        <i class="fas fa-exclamation-triangle me-2"></i> {{ session('warning') }}
    </div>
@endif

<script>
    // إخفاء أي رسالة بعد 3 ثواني
    setTimeout(() => {
        document.querySelectorAll('.msg').forEach(msg => {
            msg.classList.remove('show');
            setTimeout(() => msg.remove(), 1000);
        });
    }, 3000);
</script>