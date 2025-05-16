<x-app-layout>
    <div class="relative w-full min-h-screen">
        <!-- Background image -->
        <div class="absolute inset-0">
            <img src="{{ asset('bg-futsal.jpg') }}" alt="Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black opacity-50"></div> <!-- Overlay gelap -->
        </div>

        <!-- Konten utama -->
        <div class="relative z-10 flex items-center justify-center min-h-screen px-6">
            <div class="max-w-7xl w-full grid md:grid-cols-2 items-center gap-8 text-white">

                <!-- Text Section -->
                <div class="max-w-xl md:pl-12 text-center md:text-left ">
                    <p class="text-purple-800 font-semibold text-lg mb-2">
                        Halo {{ Auth::user()->name }} 👋, Selamat Datang
                    </p>
                    <h1 class="text-3xl font-bold mb-4 leading-snug">
                        Jaga Kebugaran Diri Bersama <br>
                        Budi Langgeng Futsal
                    </h1>
                    <p class="text-gray-300 mb-6">
                        Kesehatan adalah kunci utama dalam kehidupan. <br> Pergi sekarang.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        <a href="{{ config('variables.mapsUrl') ? config('variables.mapsUrl') : 'https://maps.app.goo.gl/dJf3GueZ847eL9DY6?g_st=com.google.maps.preview.copy' }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl shadow transition"
                            target="_blank">
                            Lokasi
                        </a>
                        <a href="https://www.instagram.com/budilanggengfutsalsport" target="_blank"
                            rel="noopener noreferrer"
                            class="border border-blue-600 text-white hover:bg-blue-700  px-6 py-3 rounded-xl shadow transition">
                            Instagram
                        </a>
                    </div>
                </div>

                <!-- Image Section -->
                <div class="text-center">
                    <img src="{{ asset('futsal-player.png') }}" alt="Pemain Futsal" class="w-full max-w-md mx-auto">
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian login -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    @if (session('error'))
                    <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Akses Tidak Diizinkan...',
                        text: '{{ session('
                        error ') }}',
                    });
                    </script>
                    @endif
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>