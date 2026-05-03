@extends('layouts.app')

@section('content')
<section class="py-24 px-6 md:px-12">
    <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-16">
        <div class="reveal-up">
            <h2 class="text-4xl font-black uppercase mb-6">About Me</h2>
            <div class="w-16 h-1 bg-cyan-400 mb-8"></div>
            <p class="text-gray-400 leading-loose">
                As a versatile Full Stack Developer, I specialize in crafting efficient, maintainable code using modern technologies like Angular and Laravel. I thrive on solving complex problems and driving innovation.
            </p>
        </div>
        
        <div class="md:col-span-2 space-y-12">
            <!-- Education -->
            <div class="reveal-up delay-1">
                <h3 class="text-xl font-bold mb-6 flex items-center gap-3">
                    <i class="fa-solid fa-graduation-cap text-cyan-400"></i> Education
                </h3>
                <div class="border-l-2 border-gray-800 pl-8 relative py-2 group hover:border-cyan-500 transition-colors">
                    <div class="absolute w-4 h-4 bg-gray-800 group-hover:bg-cyan-400 rounded-full -left-[9px] top-4 transition-colors"></div>
                    <span class="text-cyan-400 font-bold">2018 - 2022</span>
                    <h4 class="text-xl font-bold">Cordova Public College</h4>
                    <p class="text-gray-500">Bachelor of Information Technology</p>
                </div>
            </div>

            <!-- Experience -->
            <div class="reveal-up delay-2">
                <h3 class="text-xl font-bold mb-6 flex items-center gap-3">
                    <i class="fa-solid fa-briefcase text-cyan-400"></i> Experience
                </h3>
                <div class="border-l-2 border-gray-800 pl-8 relative py-2 group hover:border-cyan-500 transition-colors">
                    <div class="absolute w-4 h-4 bg-gray-800 group-hover:bg-cyan-400 rounded-full -left-[9px] top-4 transition-colors"></div>
                    <span class="text-cyan-400 font-bold">June 2022 - Present</span>
                    <h4 class="text-xl font-bold">Fullstack Developer</h4>
                    <p class="text-gray-400">Mariosoft Solutions</p>
                    <ul class="text-sm text-gray-500 mt-4 list-disc list-inside space-y-1">
                        <li>Maintain systems using Angular and Laravel.</li>
                        <li>Customize Payroll and Warehouse Management systems.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection