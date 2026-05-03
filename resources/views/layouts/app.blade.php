<!DOCTYPE html>
<html lang="en"
    x-data="themeApp()"
    x-init="initTheme()"
    :class="theme">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevSped Folio</title>

    <!-- Tailwind + Alpine -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        * {
            transition: .3s;
        }

        .light {
            --bg: #f8fafc;
            --text: #111827;
            --nav: rgba(255, 255, 255, .95);
            --border: rgba(0, 0, 0, .08);
            --card: #ffffff;
            --muted: #6b7280;
        }

        .dark {
            --bg: #05011d;
            --text: #ffffff;
            --nav: rgba(5, 1, 29, .95);
            --border: rgba(255, 255, 255, .08);
            --card: #111827;
            --muted: #9ca3af;
        }

        body {
            font-family: Inter, sans-serif;
            background: var(--bg);
            color: var(--text);
            overflow-x: hidden;
        }

        #networkCanvas {
            position: fixed;
            inset: 0;
            z-index: -10;
        }

        .glass-nav {
            background: var(--nav);
            border-bottom: 1px solid var(--border);
            backdrop-filter: blur(14px);
        }

        .theme-card {
            background: var(--card);
            border: 1px solid var(--border);
        }

        .nav-link {
            color: var(--muted);
            position: relative;
            display: inline-block;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 50%;
            width: 0;
            height: 2px;
            background: #06b6d4;
            border-radius: 999px;
            transform: translateX(-50%);
            transition: .35s;
        }

        .nav-link:hover {
            color: var(--text);
            transform: translateY(-2px);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .sidebar {
            width: 280px;
        }
    </style>
</head>

<body x-data="{ mobileMenu:false }">

    <!-- NETWORK -->
    <canvas id="networkCanvas"></canvas>

    <!-- HEADER -->
    <header
        class="sticky top-0 z-50 py-5 px-6 md:px-12 flex justify-between items-center glass-nav">

        <!-- LOGO -->
        <div class="flex items-center gap-3">

            <div class="bg-cyan-500 rounded-lg p-2">
                <i class="fa-solid fa-code text-white"></i>
            </div>

            <span class="font-bold text-xl uppercase">
                DevSped Folio
            </span>

        </div>

        <!-- DESKTOP NAV -->
        <nav
            class="hidden lg:flex gap-10 text-xs font-bold uppercase tracking-widest">

            <a href="/" class="nav-link">Home</a>
            <a href="/about" class="nav-link">About</a>
            <a href="/projects" class="nav-link">Projects</a>
            <a href="/contact" class="nav-link">Contact</a>

        </nav>

        <!-- RIGHT -->
        <div class="flex items-center gap-4">

            <!-- DESKTOP -->
            <div class="hidden lg:flex items-center gap-4">

                <!-- THEME -->
                <div class="theme-card flex rounded-full overflow-hidden">

                    <button @click="setTheme('light')"
                        class="px-3 py-2">

                        <i class="fa-solid fa-sun"></i>

                    </button>

                    <button @click="setTheme('dark')"
                        class="px-3 py-2">

                        <i class="fa-solid fa-moon"></i>

                    </button>

                    <button @click="setTheme('auto')"
                        class="px-3 py-2">

                        <i class="fa-solid fa-desktop"></i>

                    </button>

                </div>

                <!-- GITHUB -->
                <a href="https://github.com/peter090199"
                    target="_blank">

                    <i class="fa-brands fa-github text-lg"></i>

                </a>

                <!-- HIRE -->
                <div class="relative"
                    x-data="{ hireOpen:false }">

                    <button
                        @click="hireOpen=!hireOpen"
                        class="bg-cyan-600 text-white px-5 py-2 rounded-full text-xs font-bold">

                        HIRE ME

                    </button>

                    <div
                        x-show="hireOpen"
                        @click.away="hireOpen=false"
                        x-transition
                        class="absolute right-0 mt-3 w-56 rounded-2xl p-3 shadow-xl theme-card">

                        <!-- FACEBOOK -->
                        <!-- <a href="https://www.facebook.com/profile.php?id=564504396751896"
                            target="_blank"
                            class="flex items-center gap-3 px-3 py-3 rounded-xl hover:bg-cyan-500/10">

                            <i class="fa-brands fa-facebook text-cyan-500"></i>
                            <span>Facebook</span>

                        </a> -->

                        <!-- EMAIL -->
                        <a href="mailto:codexped.solutions@gmail.com?subject=Hire%20Me"
                            class="flex items-center gap-3 px-3 py-3 rounded-xl hover:bg-cyan-500/10">

                            <i class="fa-solid fa-envelope text-cyan-500"></i>
                            <span>Email</span>

                        </a>

                    </div>

                </div>

            </div>

            <!-- MOBILE BUTTON -->
            <button
                @click="mobileMenu=true"
                class="lg:hidden text-2xl">

                <i class="fa-solid fa-bars"></i>

            </button>

        </div>

    </header>

    <!-- OVERLAY -->
    <div
        x-show="mobileMenu"
        @click="mobileMenu=false"
        class="fixed inset-0 bg-black/50 z-40 lg:hidden">

    </div>

    <!-- SIDEBAR -->
    <div
        x-show="mobileMenu"
        x-transition
        class="fixed top-0 right-0 h-full sidebar z-50 theme-card p-6 lg:hidden">

        <!-- CLOSE -->
        <div class="flex justify-end mb-8">

            <button
                @click="mobileMenu=false">

                <i class="fa-solid fa-xmark text-2xl"></i>

            </button>

        </div>

        <!-- MENU -->
        <div class="flex flex-col gap-6">

            <a href="/" class="nav-link">Home</a>
            <a href="/about" class="nav-link">About</a>
            <a href="/projects" class="nav-link">Projects</a>
            <a href="/contact" class="nav-link">Contact</a>

            <hr class="opacity-20">

            <a href="https://www.facebook.com/profile.php?id=564504396751896"
                target="_blank"
                class="flex items-center gap-3">

                <i class="fa-brands fa-facebook"></i>
                <span>Facebook</span>

            </a>

            <a href="mailto:codexped.solutions@gmail.com"
                class="flex items-center gap-3">

                <i class="fa-solid fa-envelope"></i>
                <span>Email</span>

            </a>

            <!-- THEME TOGGLE (SIDEBAR) -->
            <div class="flex items-center justify-between theme-card p-3 rounded-xl">

                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-palette text-cyan-500"></i>
                    <span class="text-sm font-semibold">Theme</span>
                </div>

                <button
                    @click="setTheme(theme === 'dark' ? 'light' : 'dark')"
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-cyan-500 text-white hover:scale-110 duration-300">

                    <!-- DARK MODE ICON -->
                    <i
                        x-show="theme === 'dark'"
                        x-transition
                        class="fa-solid fa-sun text-yellow-300"></i>

                    <!-- LIGHT MODE ICON -->
                    <i
                        x-show="theme === 'light'"
                        x-transition
                        class="fa-solid fa-moon"></i>

                </button>

            </div>

        </div>

    </div>

    <!-- PAGE -->
    <main>
        @yield('content')
    </main>

    <!-- FLOATING FACEBOOK FOLLOW BUTTON -->
    <!-- FLOATING FACEBOOK FOLLOW BUTTON -->
    <div class="fixed bottom-6 right-6 z-50" x-data="{ open:false }">

        <!-- POPUP -->
        <div
            x-show="open"
            x-transition
            class="mb-3 flex flex-col items-end gap-2">

            <a href="https://www.facebook.com/profile.php?id=564504396751896"
                target="_blank"
                class="flex items-center gap-3 bg-blue-600 text-white px-4 py-3 rounded-xl shadow-lg hover:scale-105 duration-300">

                <i class="fa-brands fa-facebook"></i>
                <span>Follow DevSped Folio</span>

            </a>

        </div>

        <!-- FLOAT BUTTON -->
        <button
            @click="open = !open"
            class="w-14 h-14 bg-blue-600 text-white rounded-full shadow-xl flex items-center justify-center hover:scale-110 duration-300">

            <!-- ICON (rotate animation) -->
            <i
                class="fa-solid fa-plus text-xl transition-transform duration-300"
                :class="open ? 'rotate-45' : ''">
            </i>

        </button>

    </div>


    <!-- NETWORK -->
    <script>
        const canvas = document.getElementById("networkCanvas");
        const ctx = canvas.getContext("2d");

        let w, h;
        let points = [];

        function resize() {
            w = canvas.width = innerWidth;
            h = canvas.height = innerHeight;
        }

        addEventListener("resize", resize);
        resize();

        for (let i = 0; i < 75; i++) {
            points.push({
                x: Math.random() * w,
                y: Math.random() * h,
                vx: (Math.random() - .5) * .6,
                vy: (Math.random() - .5) * .6
            });
        }

        function draw() {

            ctx.clearRect(0, 0, w, h);

            const dark =
                document.documentElement.classList.contains("dark");

            ctx.fillStyle = dark ?
                "rgba(34,211,238,.8)" :
                "rgba(2,132,199,.8)";

            ctx.strokeStyle = dark ?
                "rgba(34,211,238,.15)" :
                "rgba(2,132,199,.15)";

            for (let i = 0; i < points.length; i++) {

                let p = points[i];

                p.x += p.vx;
                p.y += p.vy;

                if (p.x < 0 || p.x > w) p.vx *= -1;
                if (p.y < 0 || p.y > h) p.vy *= -1;

                ctx.beginPath();
                ctx.arc(
                    p.x,
                    p.y,
                    2,
                    0,
                    Math.PI * 2
                );

                ctx.fill();

                for (let j = i + 1; j < points.length; j++) {

                    const p2 = points[j];

                    const dist =
                        Math.hypot(
                            p.x - p2.x,
                            p.y - p2.y
                        );

                    if (dist < 140) {

                        ctx.globalAlpha =
                            1 - dist / 140;

                        ctx.beginPath();

                        ctx.moveTo(
                            p.x,
                            p.y
                        );

                        ctx.lineTo(
                            p2.x,
                            p2.y
                        );

                        ctx.stroke();

                        ctx.globalAlpha = 1;
                    }
                }
            }

            requestAnimationFrame(draw);
        }

        draw();
    </script>

    <!-- THEME -->
    <script>
        function themeApp() {

            return {

                theme: 'dark',

                initTheme() {

                    const saved =
                        localStorage.getItem('theme');

                    this.setTheme(
                        saved || 'auto'
                    );
                },

                setTheme(mode) {

                    localStorage.setItem(
                        'theme',
                        mode
                    );

                    if (mode === 'auto') {

                        this.theme =
                            window.matchMedia(
                                '(prefers-color-scheme: dark)'
                            ).matches ?
                            'dark' :
                            'light';

                    } else {

                        this.theme = mode;
                    }
                }
            }
        }
    </script>

</body>

</html>