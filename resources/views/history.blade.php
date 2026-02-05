<x-app-layout>
    <div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded-2xl shadow">

        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold">Riwayat Lamaran</h2>

            <div class="bg-blue-50 border border-blue-200 text-blue-700 px-4 py-2 rounded-lg text-sm font-medium">
                Total Lamaran: <span class="font-bold">{{ $logs->count() }}</span>
            </div>
        </div>

        @forelse($logs as $log)
        <div class="border rounded-lg p-4 mb-4 hover:shadow transition">

            <div class="mb-2">
                <p class="font-semibold text-lg">{{ $log->company }}</p>
                <p class="text-gray-700 text-sm">Posisi: <b>{{ $log->position }}</b></p>
                <p class="text-gray-600 text-sm">📍 {{ $log->location }}</p>
            </div>

            <div class="text-sm text-gray-500">
                Tanggal melamar:
                <span class="font-medium text-gray-700">
                    {{ $log->created_at->format('d M Y') }}
                </span>
            </div>

        </div>
        @empty
        <div class="text-center text-gray-400 py-10">
            Belum ada lamaran yang dikirim.
        </div>
        @endforelse

    </div>
</x-app-layout>