<x-app-layout>
    <div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded-2xl shadow">

        <h2 class="text-2xl font-bold mb-6 text-center">Buat Template Surat</h2>

        <form method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1 font-semibold">Nama Template</label>
                <input name="name" class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label class="block mb-1 font-semibold">Isi Surat (pakai @{{company}})</label>
                <textarea name="body" rows="8"
                    class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200"></textarea>
            </div>

            <div>
                <label class="block mb-1 font-semibold">Upload CV (PDF)</label>
                <input type="file" name="cv" class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200">
            </div>

            <button class="w-full bg-green-600 text-white p-3 rounded-lg hover:bg-green-700 transition">
                Simpan Template
            </button>
        </form>
    </div>
</x-app-layout>