<x-app-layout>






    <div class="container mx-auto px-4 py-12">
      <div class="grid md:grid-cols-2 items-center gap-8">

        <!-- Text section -->
        <div class="max-w-xl md:pl-12">
          <p class="text-purple-600 font-semibold text-lg mb-2">Halo {{ Auth::user()->name }} 👋, Selamat Datang</p>
          <h1 class="text-3xl font-bold mb-4 leading-snug">
            Jaga Kebugaran Diri Bersama <br>
            Budi Langgeng Futsal
          </h1>
          <p class="text-gray-600 mb-6">
            Kesehatan adalah kunci utama dalam kehidupan. <br> Pergi sekarang.
          </p>
          <div class="flex gap-4">
            <a href="{{ config('variables.mapsUrl') ? config('variables.mapsUrl') : 'https://maps.app.goo.gl/dJf3GueZ847eL9DY6?g_st=com.google.maps.preview.copy' }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-md shadow transition " target="_blank">
              Lokasi
            </a>
            <a href="https://www.instagram.com/budilanggengfutsalsport" target="_blank" rel="noopener noreferrer"
                class="border border-blue-600 text-blue-600 hover:bg-blue-50 px-6 py-3 rounded-md shadow transition">
                Instagram
            </a>

          </div>
        </div>

        <!-- Image section -->
        <div class="text-center">
          <img src="{{ asset('futsal-player.png') }}" alt="Pemain Futsal" class="w-full max-w-md mx-auto">
        </div>

      </div>
    </div>

     <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900">
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
