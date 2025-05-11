<div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($lapangans as $lapangan)
        <div class="bg-white rounded-lg shadow-md p-4">
            <img src="{{ Storage::url($lapangan->gambar) }}" alt="{{ $lapangan->nama }}"
                class="w-full h-48 object-cover rounded-md">
            <h2 class="text-xl font-bold mt-4">{{ $lapangan->nama }}</h2>
            <p class="text-gray-600">{{ $lapangan->deskripsi }}</p>
            <a href="{{ route('jadwal.select', $lapangan->id) }}"
                class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Pilih Jadwal</a>
        </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $lapangans->links() }}
    </div>
</div>