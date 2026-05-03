@extends('layouts.app')

@section('content')

<!-- GSAP -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

<style>
    /* ================= BASE ANIMATIONS ================= */

    .reveal-slide-left,
    .reveal-slide-right,
    .reveal-up {
        opacity: 0;
        transform: translateY(60px);
    }

    /* PROJECT CARD */
    .project-card {
        will-change: transform;
        transition: transform .35s ease, box-shadow .35s ease, border-color .35s ease;
    }

    .project-card:hover {
        transform: translateY(-12px) scale(1.015);
        box-shadow: 0 25px 70px rgba(34, 211, 238, 0.18);
    }

    .project-card:focus-visible {
        outline: none;
        box-shadow: 0 0 0 2px rgba(34, 211, 238, 0.6);
    }
</style>

<section class="py-16 md:py-24 px-4 sm:px-6 md:px-12">
    <div class="max-w-6xl mx-auto">

        <!-- TITLE -->
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-black uppercase mb-10 md:mb-16 text-center text-white reveal-up">
            Featured Projects
        </h2>

        <!-- FEATURED GRID -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8 mb-20 md:mb-24">

            <!-- ================= PROJECT 1 ================= -->
            <a href="https://myracepics.com"
               target="_blank"
               rel="noopener noreferrer"
               class="project-card reveal-slide-left group block bg-[#0a052e] border border-gray-800 rounded-2xl overflow-hidden"
               aria-label="Open MyRacePics project website">

                <div class="h-44 sm:h-52 md:h-56 bg-gray-900 flex items-center justify-center relative overflow-hidden">

                    <div class="absolute top-3 left-3 z-20 flex items-center gap-2 bg-black/50 backdrop-blur-md px-3 py-1 rounded-full border border-cyan-500/30">
                        <span class="text-[9px] sm:text-[10px] font-black text-cyan-400 uppercase tracking-widest">
                            Production Live
                        </span>
                    </div>

                    <i class="fa-solid fa-camera-retro text-5xl sm:text-6xl md:text-7xl text-gray-800 group-hover:text-cyan-500 transition-all"></i>

                    <div class="absolute inset-0 bg-gradient-to-t from-[#0a052e] to-transparent opacity-60"></div>
                </div>

                <div class="p-5 sm:p-6 md:p-8">

                    <div class="flex justify-between items-start mb-4">

                        <div>
                            <h3 class="text-xl sm:text-2xl md:text-3xl font-black text-white group-hover:text-cyan-400 transition">
                                MyRacePics
                            </h3>

                            <p class="text-cyan-400 text-xs font-bold uppercase tracking-widest mt-1">
                                Full Stack Developer
                            </p>
                        </div>

                        <div class="p-2 sm:p-3 bg-white/10 rounded-xl border border-gray-700 group-hover:border-cyan-400 transition">
                            <i class="fa-solid fa-arrow-up-right-from-square text-gray-300 group-hover:text-cyan-400 transition"></i>
                        </div>

                    </div>

                    <p class="text-gray-400 text-xs sm:text-sm mb-6">
                        MyRacePics is a high-performance sports photography platform designed for large-scale event coverage and automated photo delivery.
                    </p>

                    <div class="flex flex-wrap gap-2">
                        <span class="text-xs px-3 py-1 bg-gray-800 text-gray-400 rounded-md">Angular</span>
                        <span class="text-xs px-3 py-1 bg-gray-800 text-gray-400 rounded-md">REST APIs</span>
                        <span class="text-xs px-3 py-1 bg-gray-800 text-gray-400 rounded-md">CloudFlare</span>
                        <span class="text-xs px-3 py-1 bg-cyan-500/10 text-cyan-400 border rounded-md">Laravel</span>
                    </div>

                </div>
            </a>

            <!-- ================= PROJECT 2 ================= -->
            <a href="https://nexsuz.com"
               target="_blank"
               rel="noopener noreferrer"
               class="project-card reveal-slide-right group block bg-[#0a052e] border border-gray-800 rounded-2xl overflow-hidden"
               aria-label="Open Nexsuz project website">

                <div class="h-44 sm:h-52 md:h-56 bg-gray-900 flex items-center justify-center relative overflow-hidden">

                    <div class="absolute top-3 left-3 z-20 bg-black/50 backdrop-blur-md px-3 py-1 rounded-full border border-gray-800">
                        <span class="text-[9px] sm:text-[10px] font-black text-gray-400 uppercase tracking-widest">
                            Live Platform
                        </span>
                    </div>

                    <i class="fa-solid fa-users-rays text-5xl sm:text-6xl md:text-7xl text-gray-800 group-hover:text-cyan-500 transition-all"></i>

                    <div class="absolute inset-0 bg-gradient-to-t from-[#0a052e] to-transparent opacity-60"></div>
                </div>

                <div class="p-5 sm:p-6 md:p-8">

                    <div class="flex justify-between items-start mb-4">

                        <div>
                            <h3 class="text-xl sm:text-2xl md:text-3xl font-black text-white group-hover:text-cyan-400 transition">
                                Nexsuz
                            </h3>

                            <p class="text-cyan-400 text-xs font-bold uppercase tracking-widest mt-1">
                                Full Stack Developer
                            </p>
                        </div>

                        <div class="p-2 sm:p-3 bg-white/10 rounded-xl border border-gray-700 group-hover:border-cyan-400 transition">
                            <i class="fa-solid fa-arrow-up-right-from-square text-gray-300 group-hover:text-cyan-400 transition"></i>
                        </div>

                    </div>

                    <p class="text-gray-400 text-xs sm:text-sm mb-6">
                        Nexsuz helps professionals build and maintain relationships with colleagues, mentors, and industry leaders.
                    </p>

                    <div class="flex flex-wrap gap-2">
                        <span class="text-xs px-3 py-1 bg-cyan-500/10 text-cyan-400 border rounded-md">Angular</span>
                        <span class="text-xs px-3 py-1 bg-gray-800 text-gray-400 rounded-md">Laravel</span>
                    </div>

                </div>
            </a>

        </div>

        <!-- Ongoing -->
        <h2 class="text-lg sm:text-xl md:text-2xl font-black uppercase mb-6 text-cyan-400 reveal-up">
            In the Lab <span class="text-gray-600">/ Ongoing</span>
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 md:gap-6">

            <div class="project-card reveal-up bg-[#0a052e]/50 border border-gray-800 rounded-xl p-5">
                <i class="fa-solid fa-droplet text-cyan-500 text-xl mb-4"></i>
                <h4 class="text-white font-bold">Lizdro E-Commerce</h4>
                <p class="text-gray-400 text-xs mt-2">Clean UI storefront</p>
            </div>

            <div class="project-card reveal-up bg-[#0a052e]/50 border border-gray-800 rounded-xl p-5">
                <i class="fa-solid fa-file-invoice-dollar text-cyan-500 text-xl mb-4"></i>
                <h4 class="text-white font-bold">Payroll System</h4>
                <p class="text-gray-400 text-xs mt-2">Legacy modernization</p>
            </div>

            <div class="project-card reveal-up bg-[#0a052e]/50 border border-gray-800 rounded-xl p-5">
                <i class="fa-solid fa-brain text-cyan-500 text-xl mb-4"></i>
                <h4 class="text-white font-bold">Nexsuz AI</h4>
                <p class="text-gray-400 text-xs mt-2">Resume ranking engine</p>
            </div>

        </div>

    </div>
</section>

<!-- ================= GSAP ANIMATION ================= -->
<script>
    gsap.registerPlugin(ScrollTrigger);

    gsap.utils.toArray(".reveal-slide-left").forEach(el => {
        gsap.fromTo(el, { x: -120, opacity: 0 }, {
            x: 0,
            opacity: 1,
            duration: 1,
            scrollTrigger: { trigger: el, start: "top 80%" }
        });
    });

    gsap.utils.toArray(".reveal-slide-right").forEach(el => {
        gsap.fromTo(el, { x: 120, opacity: 0 }, {
            x: 0,
            opacity: 1,
            duration: 1,
            scrollTrigger: { trigger: el, start: "top 80%" }
        });
    });

    gsap.utils.toArray(".reveal-up").forEach(el => {
        gsap.fromTo(el, { y: 60, opacity: 0 }, {
            y: 0,
            opacity: 1,
            duration: 1,
            scrollTrigger: { trigger: el, start: "top 85%" }
        });
    });
</script>

@endsection