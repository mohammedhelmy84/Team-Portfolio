<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>بورتفوليو فريق المبرمجين</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <!-- AOS (Animate on Scroll) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

    <!-- Fontawesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        :root {
            --accent: #0069ff;
            --accent-dark: #0047b3;
            --glass: rgba(255, 255, 255, 0.06);
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Noto Kufi Arabic', 'Droid Arabic Kufi', Tahoma, sans-serif;
            background: linear-gradient(180deg, #0f172a 0%, #071024 100%);
            color: #e6eef8;
            padding-top: 80px;
            /* عشان المحتوى ما يختفيش ورا النافبار */
        }

        /* Navbar */
        .navbar {
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(10px);
        }

        .nav-link {
            color: rgba(230, 238, 248, 0.85);
        }

        .nav-link:hover {
            color: #fff;
        }

        .navbar.scrolled {
            background: rgba(0, 0, 0, 0.8);
            /* خلفية بعد ما تعمل scroll */
            transition: background 0.3s ease;
        }

        /* Hero */
        .hero {
            padding: 5.5rem 0;
        }

        /* Glass Cards */
        .card-glass {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.03), rgba(255, 255, 255, 0.02));
            border: 1px solid rgba(255, 255, 255, 0.04);
            backdrop-filter: blur(6px);
        }

        .typewriter {
            display: inline-block;
            border-right: 3px solid #000;
            white-space: normal;
            /* السماح بالنزول لسطر جديد */
            word-wrap: break-word;
            /* يكسر الكلمة الطويلة */
            overflow: hidden;
            animation: blink 0.7s infinite;
        }

        @keyframes blink {
            0% {
                border-color: transparent;
            }

            50% {
                border-color: black;
            }

            100% {
                border-color: transparent;
            }
        }

        /* كروت شفافة مع أنيميشن Fade-in عند الدخول */
        .card-fade-in {
            background-color: rgba(255, 255, 255, 0.1) !important;
            backdrop-filter: blur(10px);
            animation: fadeInUp 0.8s ease forwards;
            opacity: 0;
        }

        @keyframes fadeInUp {
            0% {
                transform: translateY(20px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Team */
        .team-card img {
            width: 110px;
            height: 110px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid rgba(255, 255, 255, 0.06);
        }

        /* Projects */
        .project-thumb {
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
        }

        /* Buttons */
        .btn-accent {
            background: var(--accent);
            border: none;
        }

        .btn-accent:hover {
            background: var(--accent-dark);
        }

        /* Floating contact */
        .float-contact {
            position: fixed;
            left: 1rem;
            bottom: 1rem;
            z-index: 999;
        }

        /* Footer */
        footer {
            padding: 2rem 0;
            opacity: 0.95;
            background: #0b1220;
        }

        .text-accent {
            color: var(--accent);
        }

        .footer-link:hover {
            color: var(--accent) !important;
            transition: 0.3s;
        }

        .footer-glass {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.03), rgba(255, 255, 255, 0.02));
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(8px);
        }

        .text-accent {
            color: #0d6efd;
            /* الأزرق الأساسي */
        }

        .footer-link:hover {
            color: #0d6efd !important;
            transition: 0.3s;
        }

        /* Responsive tweaks */
        @media (max-width: 768px) {
            .hero {
                padding: 3rem 0;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0">
        @include('admin.partials.navbar')
        @include('admin.partials.sidebar')
           <!-- Main Content -->
        <div id="main-content" style="margin-right:220px; padding:20px; margin-top:56px; transition: margin 0.3s;">

        {{-- المحتوى الرئيسي --}}
        @yield('content')

        {{-- الفوتر --}}
       </div>
    </div>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });
        // smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(a => {
            a.addEventListener('click', e => {
                const target = document.querySelector(a.getAttribute('href'));
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            })
        })
    </script>
    <script>
        document.addEventListener("scroll", function () {
            const navbar = document.querySelector(".navbar");
            if (window.scrollY > 50) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        });
    </script>

    <script>
        const text = "بورتفوليو فريق متكامل Websites & Applications";
        let i = 0;
        function typeWriter() {
            if (i < text.length) {
                document.getElementById("typewriter").textContent += text.charAt(i);
                i++;
                setTimeout(typeWriter, 100); // سرعة الكتابة (كل 100 مللي ثانية)
            }
        }
        window.onload = typeWriter;
    </script>

    <script>
        const toggleBtn = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        const sidebarIcon = document.getElementById('sidebarIcon');

        toggleBtn.addEventListener('click', () => {
            if (sidebar.style.right === '-220px') {
                sidebar.style.right = '0';
                mainContent.style.marginRight = '220px';
                sidebarIcon.classList.remove('fa-angle-right');
                sidebarIcon.classList.add('fa-angle-left'); // سهم يشير لليسار عند فتح القائمة
            } else {
                sidebar.style.right = '-220px';
                mainContent.style.marginRight = '0';
                sidebarIcon.classList.remove('fa-angle-left');
                sidebarIcon.classList.add('fa-angle-right'); // سهم يشير لليمين عند إخفاء القائمة
            }
        });
    </script>
</body>

</html>