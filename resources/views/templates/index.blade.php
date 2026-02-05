<x-app-layout>
    <div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded-2xl shadow">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-center w-full">Template Surat</h2>
        </div>

        <a href="/templates/create"
            class="block text-center bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 transition mb-6">
            + Buat Template
        </a>

        @foreach($templates as $t)
        <div class="border rounded-lg p-4 mb-4 flex justify-between items-center hover:shadow transition">
            <p class="font-semibold text-lg">{{ $t->name }}</p>

            <div class="flex gap-2">
                <a href="{{ route('templates.edit', $t->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-lg">
                    Edit
                </a>

                <form action="{{ route('templates.destroy', $t->id) }}" method="POST"
                    onsubmit="return confirm('Yakin hapus template ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-600 text-white px-3 py-1 rounded-lg">
                        Delete
                    </button>
                </form>
            </div>
        </div>
        @endforeach

    </div>
</x-app-layout>