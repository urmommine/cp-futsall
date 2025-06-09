<div class="relative w-full min-h-screen flex flex-col justify-between">
    <!-- Background image with gradient overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('bg-futsal.jpg') }}" alt="Background" class="w-full h-full object-cover brightness-75">
        <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-blue-900/60 to-blue-700/40"></div>
    </div>

    <!-- Konten utama -->
    <div class="relative z-10 px-4 py-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($get_event as $event)
            <div class="bg-blue-100 rounded-lg shadow-md p-4">
                <img src="{{ Storage::url($event->gambar_event) }}"
                     alt="{{ $event->nama_organizer }}"
                     class="w-20 h-30 object-cover rounded-md mx-auto cursor-pointer"
                     onclick="showImage('{{ Storage::url($event->gambar_event) }}')">

                <h2 class="text-xl font-bold mt-4">{{ $event->nama_organizer }}</h2>
                <p class="text-gray-600">{{ $event->tanggal_event }}</p>
                <p class="text-gray-600">{{ $event->deskripsi_event }}</p>
            </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $get_event->links() }}
        </div>
    </div>

    <!-- Modal Viewer -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-70 overflow-auto flex items-center justify-center hidden z-50 transition-opacity duration-300 ease-in-out">
        <div class="relative bg-white rounded-lg p-6 shadow-xl max-w-3xl w-150 mx-4 my-10">
            <!-- Tombol Close -->
            <button onclick="closeModal()"
                    class="absolute top-3 right-3 text-black bg-red-500 hover:bg-red-600 p-2 rounded-full text-xl font-bold z-20 shadow-md">
                &times;
            </button>

            <!-- Gambar dengan transisi -->
            <img id="modalImage" src="" alt="Preview"
                 class="max-w-[60vh] max-h-[120vh] object-contain rounded-md shadow-md mx-auto transition-all duration-300 ease-in-out">

            <!-- Tombol Download -->
            <div class="text-center mt-4">
                <a id="downloadBtn" href="#" download
                   class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow-md transition duration-300">
                    Download Gambar
                </a>
            </div>
        </div>
    </div>

    <!-- Modal Script -->
    <script>
        function showImage(src) {
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImage');
            const downloadBtn = document.getElementById('downloadBtn');

            modalImg.src = src;
            downloadBtn.href = src;
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // prevent background scroll
        }

        function closeModal() {
            const modal = document.getElementById('imageModal');
            modal.classList.add('hidden');
            document.body.style.overflow = ''; // restore scroll
        }

        document.getElementById('imageModal').addEventListener('click', function (e) {
            if (e.target.id === 'imageModal') {
                closeModal();
            }
        });
    </script>
</div>
