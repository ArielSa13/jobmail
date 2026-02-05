<x-app-layout>
    <div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded-2xl shadow">

        <h2 class="text-2xl font-bold mb-6 text-center">Kirim Lamaran Kerja</h2>

        @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        @if(!auth()->user()->google_token)
        <a href="/google/redirect"
            class="block mb-4 bg-red-500 hover:bg-red-600 text-white text-center p-3 rounded-lg transition">
            Connect Gmail Terlebih Dahulu
        </a>
        @else
        <div class="block mb-4 bg-green-500 text-white text-center p-3 rounded-lg cursor-not-allowed">
            Gmail Sudah Terhubung ✅
        </div>
        @endif

        <form method="POST" action="/send" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1 font-semibold">Email Perusahaan</label>
                <input type="email" name="email" required
                    class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label class="block mb-1 font-semibold">Subject Email</label>
                <input type="text" name="subject" required
                    class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label class="block mb-1 font-semibold">Nama Perusahaan</label>
                <input type="text" name="company" required
                    class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200">
            </div>

            <div class="mb-3">
                <label class="block mb-1 font-semibold">Lokasi Perusahaan</label>
                <input type="text" name="location" class="w-full border p-2 rounded" required>
            </div>

            <div>
                <label class="block mb-1 font-semibold">Pilih Template</label>
                <select name="template_id" class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200">
                    @foreach($templates as $t)
                    <option value="{{ $t->id }}">{{ $t->name }}</option>
                    @endforeach
                </select>
            </div>

            <button class="w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 transition">
                Kirim Lamaran
            </button>
        </form>
    </div>
</x-app-layout>