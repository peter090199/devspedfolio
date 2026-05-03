@extends('layouts.app')

@section('content')

<style>
/* ================= THEME VARIABLES ================= */
:root {
    --text-primary: #0f172a;
    --text-secondary: #475569;
    --bg-gradient: #f8fafc;
    --accent: #06b6d4;
}

.dark {
    --text-primary: #f8fafc;
    --text-secondary: #94a3b8;
    --bg-gradient: #05011d;
    --accent: #22d3ee;
}

body {
    background: var(--bg-gradient);
    color: var(--text-primary);
    overflow-x: hidden;
    transition: background 0.4s ease, color 0.4s ease;
}

.text-adaptive { color: var(--text-primary); }
.text-muted { color: var(--text-secondary); }
.text-accent { color: var(--accent); }

/* FLOAT */
@keyframes float {
    0%,100% { transform: translateY(0); }
    50% { transform: translateY(-12px); }
}

.animate-float {
    animation: float 6s ease-in-out infinite;
}

/* REVEAL */
.reveal-up,
.reveal-right {
    opacity: 0;
    transition: all 0.8s ease;
}

.reveal-up { transform: translateY(30px); }
.reveal-right { transform: translateX(30px); }

.reveal-visible {
    opacity: 1;
    transform: translate(0);
}

/* NETWORK CANVAS */
#networkCanvas {
    position: fixed;
    inset: 0;
    width: 100%;
    height: 100%;
    z-index: -10;
    pointer-events: none;
}
</style>

<!-- 🌐 NETWORK BACKGROUND -->
<canvas id="networkCanvas"></canvas>

<section class="relative min-h-screen flex items-center px-6 md:px-12">

    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center w-full">

        <!-- LEFT -->
        <div class="space-y-6 order-2 md:order-1">

            <h2 class="text-accent font-bold tracking-[0.3em] uppercase text-xs reveal-up">
                Full Stack Developer
            </h2>

            <h1 class="text-4xl md:text-6xl lg:text-7xl font-black leading-tight text-adaptive reveal-up">
                Yorpo,<br>

                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[var(--text-secondary)] to-[var(--text-primary)]">
                    Pedro L. Jr.
                </span>
            </h1>

            <p class="text-base md:text-xl text-muted max-w-md reveal-up">
                Building <span id="typed-text" class="text-accent font-mono"></span>
            </p>

            <!-- BUTTONS -->
            <div class="flex flex-wrap gap-4 pt-4 reveal-up">

                <a href="/projects"
                   class="bg-cyan-600 hover:bg-cyan-500 text-white px-6 md:px-8 py-3 md:py-4 rounded-xl font-bold transition hover:-translate-y-1 hover:shadow-lg">
                    VIEW PROJECTS
                </a>

                <a href="{{ asset('assets/docs/resume.pdf') }}" download
                   class="border border-gray-400/30 dark:border-white/10 px-6 md:px-8 py-3 md:py-4 rounded-xl font-bold text-adaptive hover:bg-white/5 transition">
                    DOWNLOAD CV
                </a>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="order-1 md:order-2 reveal-right flex justify-center relative">

            <img src="{{ asset('assets/img/profile.PNG') }}"
                 class="w-[250px] sm:w-[300px] md:w-[360px] rounded-[2rem] object-cover animate-float shadow-2xl">

            <!-- EXPERIENCE -->
            <div class="absolute -bottom-5 -right-5 backdrop-blur-md border border-white/10 p-4 rounded-xl hidden md:block">

                @php
                    $startDate = \Carbon\Carbon::parse('2022-09-23');
                    $years = (int) $startDate->diffInYears(now());
                    $months = (int) ($startDate->diffInMonths(now()) % 12);
                @endphp

                <div class="flex items-center gap-3">

                    <div class="text-adaptive font-black text-lg">
                        {{ $years }}Y {{ $months }}M
                    </div>

                    <div class="text-muted text-xs font-bold uppercase border-l border-white/10 pl-3">
                        Exp
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ================= SCRIPTS ================= -->

<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>

<script>
/* TYPED */
new Typed('#typed-text', {
    strings: [
        'Scalable Cloud Systems',
        'High-Performance APIs',
        'Modern Web Experiences',
        'Desktop Applications'
    ],
    typeSpeed: 60,
    backSpeed: 40,
    backDelay: 2000,
    loop: true,
    cursorChar: '_'
});

/* REVEAL */
const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('reveal-visible');
        }
    });
}, { threshold: 0.1 });

document.querySelectorAll('.reveal-up, .reveal-right')
    .forEach(el => observer.observe(el));

/* ================= NETWORK BACKGROUND ================= */
const canvas = document.getElementById("networkCanvas");
const ctx = canvas.getContext("2d");

let w, h;
let points = [];
const COUNT = 70;

function resize() {
    w = canvas.width = window.innerWidth;
    h = canvas.height = window.innerHeight;
}
window.addEventListener("resize", resize);
resize();

for (let i = 0; i < COUNT; i++) {
    points.push({
        x: Math.random() * window.innerWidth,
        y: Math.random() * window.innerHeight,
        vx: (Math.random() - 0.5) * 0.5,
        vy: (Math.random() - 0.5) * 0.5
    });
}

function animate() {
    ctx.clearRect(0, 0, w, h);

    const isDark = document.documentElement.classList.contains("dark");

    ctx.fillStyle = isDark
        ? "rgba(34,211,238,0.75)"
        : "rgba(2,132,199,0.55)";

    ctx.strokeStyle = isDark
        ? "rgba(34,211,238,0.14)"
        : "rgba(2,132,199,0.08)";

    for (let i = 0; i < points.length; i++) {
        let p = points[i];

        p.x += p.vx;
        p.y += p.vy;

        if (p.x < 0 || p.x > w) p.vx *= -1;
        if (p.y < 0 || p.y > h) p.vy *= -1;

        ctx.beginPath();
        ctx.arc(p.x, p.y, 2, 0, Math.PI * 2);
        ctx.fill();

        for (let j = i + 1; j < points.length; j++) {
            let p2 = points[j];
            let dist = Math.hypot(p.x - p2.x, p.y - p2.y);

            if (dist < 130) {
                ctx.globalAlpha = 1 - dist / 130;
                ctx.beginPath();
                ctx.moveTo(p.x, p.y);
                ctx.lineTo(p2.x, p2.y);
                ctx.stroke();
                ctx.globalAlpha = 1;
            }
        }
    }

    requestAnimationFrame(animate);
}

animate();
</script>

@endsection