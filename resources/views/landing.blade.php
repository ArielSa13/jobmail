<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>JobMailer</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-white text-gray-800">

    <!-- Navbar -->
    <div class="w-full py-6 px-16 flex justify-between items-center">
        <div class="text-2xl font-bold text-blue-600">JobMailer</div>

        <div class="flex gap-6 text-sm font-medium">
            <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600">Login</a>
            <a href="{{ route('register') }}"
                class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
                Register
            </a>
        </div>
    </div>

    <!-- Hero -->
    <div class="min-h-[80vh] flex items-center px-16">
        <div class="grid md:grid-cols-2 gap-16 items-center w-full">

            <!-- LEFT -->
            <div>
                <h1 class="text-6xl font-extrabold leading-tight mb-6">
                    Kirim Lamaran Kerja <br>
                    <span class="text-blue-600">Lebih Cepat & Lebih Rapi</span>
                </h1>

                <p class="text-gray-600 text-lg mb-8 max-w-xl">
                    Kelola template surat, kirim CV otomatis via Gmail API,
                    dan simpan riwayat semua lamaran kerja kamu dalam satu tempat.
                </p>

                <a href="{{ route('register') }}"
                    class="bg-blue-600 text-white px-8 py-4 rounded-xl shadow-lg hover:bg-blue-700 transition">
                    Mulai Sekarang Gratis
                </a>
            </div>

            <!-- RIGHT (visual kosong tapi bikin balance) -->
            <div class="hidden md:block">
                <div class="bg-blue-50 rounded-3xl h-[350px] shadow-inner"></div>
            </div>

        </div>
    </div>

    <!-- Features -->
    <div class="px-16 pb-20">
        <div class="grid md:grid-cols-3 gap-12 text-center">

            <div>
                <div class="font-semibold text-blue-600 mb-2">Template & CV</div>
                <p class="text-gray-500 text-sm">
                    Simpan template surat dan CV untuk berbagai posisi pekerjaan.
                </p>
            </div>

            <div>
                <div class="font-semibold text-blue-600 mb-2">Gmail Automation</div>
                <p class="text-gray-500 text-sm">
                    Kirim lamaran langsung tanpa buka Gmail satu per satu.
                </p>
            </div>

            <div>
                <div class="font-semibold text-blue-600 mb-2">Tracking Lamaran</div>
                <p class="text-gray-500 text-sm">
                    Catat perusahaan, posisi, lokasi, dan tanggal kamu melamar.
                </p>
            </div>

        </div>
    </div>

</body>

</html>