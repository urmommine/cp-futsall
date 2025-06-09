<x-app-layout>
    <div class="relative w-full min-h-screen flex flex-col justify-between">
        <!-- Background image with gradient overlay -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('bg-futsal.jpg') }}" alt="Background" class="w-full h-full object-cover brightness-75">
            <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-blue-900/60 to-blue-700/40"></div>
        </div>

        <!-- Main Content -->
        <div class="relative z-10 flex items-center justify-center min-h-[70vh] px-6 py-16">
            <div class="max-w-7xl w-full grid md:grid-cols-2 items-center gap-12 text-white">
                <!-- Text Section -->
                <div class="max-w-xl md:pl-12 text-center md:text-left animate-fade-in-up">
                    <p class="text-pink-400 font-semibold text-lg mb-3 tracking-wide drop-shadow-lg">
                        Halo <span class="font-bold">{{ Auth::user()->name }}</span> 👋, Selamat Datang
                    </p>
                    <h1 class="text-4xl md:text-5xl font-extrabold mb-5 leading-tight drop-shadow-xl">
                        Jaga Kebugaran Diri <br>
                        Bersama <span class="text-blue-400">Budi Langgeng Futsal</span>
                    </h1>
                    <p class="text-gray-200 mb-8 text-lg font-medium">
                        Kesehatan adalah kunci utama dalam kehidupan.<br>
                        <span class="italic text-blue-200">Ayo bergerak sekarang!</span>
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        <a href="{{ config('variables.mapsUrl') ? config('variables.mapsUrl') : 'https://maps.app.goo.gl/dJf3GueZ847eL9DY6?g_st=com.google.maps.preview.copy' }}"
                            class="bg-gradient-to-r from-blue-600 to-blue-400 hover:from-blue-700 hover:to-blue-500 text-white px-7 py-3 rounded-2xl shadow-lg font-semibold text-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-300"
                            target="_blank">
                            <svg class="inline-block w-5 h-5 mr-2 -mt-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 12.414a4 4 0 10-1.414 1.414l4.243 4.243a1 1 0 001.414-1.414z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            Lokasi
                        </a>
                        <a href="https://www.instagram.com/budilanggengfutsalsport" target="_blank"
                            rel="noopener noreferrer"
                            class="border-2 border-blue-400 text-white hover:bg-blue-700 hover:border-blue-700 px-7 py-3 rounded-2xl shadow-lg font-semibold text-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-300">
                            <svg class="inline-block w-5 h-5 mr-2 -mt-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M7.75 2A5.75 5.75 0 002 7.75v8.5A5.75 5.75 0 007.75 22h8.5A5.75 5.75 0 0022 16.25v-8.5A5.75 5.75 0 0016.25 2h-8.5zm0 1.5h8.5A4.25 4.25 0 0120.5 7.75v8.5a4.25 4.25 0 01-4.25 4.25h-8.5A4.25 4.25 0 013.5 16.25v-8.5A4.25 4.25 0 017.75 3.5zm4.25 2.25a5.25 5.25 0 100 10.5 5.25 5.25 0 000-10.5zm0 1.5a3.75 3.75 0 110 7.5 3.75 3.75 0 010-7.5zm5.25.75a1.25 1.25 0 11-2.5 0 1.25 1.25 0 012.5 0z"/>
                            </svg>
                            Instagram
                        </a>
                    </div>
                </div>
                <!-- Image Section -->
                <div class="text-center animate-fade-in">
                    <div class="relative inline-block">
                        <img src="{{ asset('futsal-player.png') }}" alt="Pemain Futsal" class="w-full max-w-md mx-auto drop-shadow-2xl rounded-3xl border-4 border-blue-400/30 bg-white/10 backdrop-blur-lg">
                        <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 bg-gradient-to-r from-blue-500 to-blue-300 px-6 py-2 rounded-full text-white font-bold text-lg shadow-lg animate-bounce">
                            Let's Play!
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Login Info Section -->
        <div class="relative z-20 py-10">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white/90 backdrop-blur-md overflow-hidden shadow-xl sm:rounded-2xl border border-blue-100">
                    <div class="p-8 text-gray-900 text-center text-lg font-semibold">
                        @if (session('error'))
                        <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Akses Tidak Diizinkan...',
                            text: '{{ session('error') }}',
                        });
                        </script>
                        @endif
                        <span class="flex items-center justify-center gap-2 text-blue-700">
                            <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                            {{ __("You're logged in!") }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="relative z-30 bg-gradient-to-r from-blue-900 via-blue-800 to-blue-700 text-white py-8 mt-10 shadow-inner">
            <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('futsal-player.png') }}" alt="Logo" class="w-10 h-10 rounded-full shadow-lg border-2 border-blue-400">
                    <span class="font-bold text-xl tracking-wide">Budi Langgeng Futsal</span>
                </div>
                <div class="text-sm text-blue-200 mt-2 md:mt-0">
                    &copy; {{ date('Y') }} Budi Langgeng Futsal. All rights reserved.
                </div>
                <div class="flex gap-4 mt-2 md:mt-0">
                    <a href="https://www.instagram.com/budilanggengfutsalsport" target="_blank" class="hover:text-pink-400 transition">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7.75 2A5.75 5.75 0 002 7.75v8.5A5.75 5.75 0 007.75 22h8.5A5.75 5.75 0 0022 16.25v-8.5A5.75 5.75 0 0016.25 2h-8.5zm0 1.5h8.5A4.25 4.25 0 0120.5 7.75v8.5a4.25 4.25 0 01-4.25 4.25h-8.5A4.25 4.25 0 013.5 16.25v-8.5A4.25 4.25 0 017.75 3.5zm4.25 2.25a5.25 5.25 0 100 10.5 5.25 5.25 0 000-10.5zm0 1.5a3.75 3.75 0 110 7.5 3.75 3.75 0 010-7.5zm5.25.75a1.25 1.25 0 11-2.5 0 1.25 1.25 0 012.5 0z"/>
                        </svg>
                    </a>
                    <a href="{{ config('variables.mapsUrl') ? config('variables.mapsUrl') : 'https://maps.app.goo.gl/dJf3GueZ847eL9DY6?g_st=com.google.maps.preview.copy' }}" target="_blank" class="hover:text-green-300 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 12.414a4 4 0 10-1.414 1.414l4.243 4.243a1 1 0 001.414-1.414z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </footer>
    </div>

    <!-- Animations (optional, can be removed if not using Tailwind plugins) -->
    <style>
        @keyframes fade-in-up {
            0% { opacity: 0; transform: translateY(40px);}
            100% { opacity: 1; transform: translateY(0);}
        }
        .animate-fade-in-up {
            animation: fade-in-up 1s cubic-bezier(.4,0,.2,1) both;
        }
        @keyframes fade-in {
            0% { opacity: 0;}
            100% { opacity: 1;}
        }
        .animate-fade-in {
            animation: fade-in 1.2s cubic-bezier(.4,0,.2,1) both;
        }
    </style>
</x-app-layout>
