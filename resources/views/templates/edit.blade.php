<x-app-layout>
    <div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded-2xl shadow">

        <h2 class="text-2xl font-bold mb-6 text-center">Edit Template</h2>

        <form action="{{ route('templates.update', $template->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-1 font-semibold">Nama Template</label>
                <input type="text" name="name" value="{{ $template->name }}"
                    class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200" required>
            </div>

            <div>
                <label class="block mb-1 font-semibold">Isi Template</label>
                <textarea name="body" rows="8" class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200"
                    required>{{ $template->body }}</textarea>
            </div>

            <div>
                <label class="block mb-1 font-semibold">Ganti CV (opsional)</label>
                <input type="file" name="cv" class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200">
            </div>

            <button class="w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 transition">
                Update Template
            </button>
        </form>
    </div>
</x-app-layout>