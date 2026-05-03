@extends('layouts.app')

@section('content')
<section class="py-24 px-6 md:px-12">
    <div class="max-w-4xl mx-auto text-center">

        <h2 class="text-4xl font-black uppercase mb-4 reveal-up">Get In Touch</h2>

        <p class="text-gray-400 mb-2 reveal-up delay-1">
            Currently based in Basak, Lapu-Lapu City. Let's build something together.
        </p>

        {{-- CONTACT INFO --}}
        <div class="mb-10 text-gray-300 text-sm space-y-1 reveal-up delay-1">
            <p>📍 Cebu, Philippines</p>
            <p>📱 +63 9277232139</p>
            <p>
                📘 Facebook:
                <a href="https://www.facebook.com/profile.php?id=61573810484384"
                    target="_blank"
                    class="text-cyan-400 hover:underline">
                    DevSped Folio
                </a>
            </p>
        </div>

        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))
        <div class="mb-6 p-4 bg-green-600 text-white rounded-lg">
            {{ session('success') }}
        </div>
        @endif

        {{-- FORM --}}
        <form action="{{ route('contact.send') }}" method="POST"
            class="space-y-4 max-w-2xl mx-auto text-left reveal-up delay-2">

            @csrf

            <div class="grid md:grid-cols-2 gap-4">
                <input type="text" name="name" placeholder="Full Name"
                    class="w-full bg-[#0a052e] border border-gray-800 p-4 rounded-lg focus:border-cyan-400 outline-none text-white"
                    required>

                <input type="email" name="email" placeholder="Email Address"
                    class="w-full bg-[#0a052e] border border-gray-800 p-4 rounded-lg focus:border-cyan-400 outline-none text-white"
                    required>
            </div>

            <!-- 📱 NEW: Mobile Number (PH) -->
            <input type="text" name="phone" placeholder="Mobile Number (PH) +63"
                class="w-full bg-[#0a052e] border border-gray-800 p-4 rounded-lg focus:border-cyan-400 outline-none text-white"
                required>

            <!-- 📘 NEW: Facebook Account -->
            <input type="text" name="facebook" placeholder="Facebook Account Name"
                class="w-full bg-[#0a052e] border border-gray-800 p-4 rounded-lg focus:border-cyan-400 outline-none text-white"
                required>

            <textarea name="message" rows="5" placeholder="Tell me about your project"
                class="w-full bg-[#0a052e] border border-gray-800 p-4 rounded-lg focus:border-cyan-400 outline-none text-white"
                required></textarea>


            <button type="submit"
                class="w-full bg-cyan-600 hover:bg-cyan-500 py-4 rounded-lg font-black transition-all duration-300 active:scale-95">
                SEND MESSAGE
            </button>

        </form>

    </div>
</section>
@endsection