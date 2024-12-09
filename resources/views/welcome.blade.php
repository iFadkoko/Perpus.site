<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/90 h-full w-full overflow-hidden" >
<section
    class="relative w-screen h-screen"
    >
    <img
    src="img/perpustakaan4.png"  class="absolute inset-0 w-full h-screen object-cover"
  >
</img>
    <div
        class="absolute inset-0  ltr:sm:bg-gradient-to-r rtl:sm:bg-gradient-to-l"
    ></div>

    <div
        class="relative mx-auto max-w-screen-xl px-4 py-32 sm:px-6 lg:flex lg:h-screen lg:items-center lg:px-8"
    >
        <div class="max-w-xl">
        <h1 class="text-3xl font-extrabold sm:text-5xl bg-gray-800/40 p-4 rounded-md ">
            PERPUSTAKAAN

            <strong class="block font-extrabold text-amber-600">POLITEKNIK PAJAJARAN</strong>
        </h1>

        <p class="mt-4 max-w-lg sm:text-xl/relaxed bg-gray-900/40 p-4 rounded-md text-slate-200">
            Selamat datang di website Perpustakaan Politeknik pajajaran disini kamu bisa melihat daftar buku dan melihat status pinjam buku di perpustakaan 
        </p>

        <div class="mt-8 flex flex-wrap gap-4 text-center">
            @if (Route::has('login'))
            @auth
                <a
                    href="{{ url('/dashboard') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                >
                    Dashboard
                </a>
            @else
                <a
                    href="{{ route('login') }}"
                    class="block w-full rounded bg-amber-600 px-12 py-3 text-sm font-medium text-white shadow hover:bg-amber-800 focus:outline-none focus:ring active:bg-indigo-500 sm:w-auto"
                >
                    Log in
                </a>

                @if (Route::has('register'))
                    <a
                        href="{{ route('register') }}"
                                class="block w-full rounded bg-white px-12 py-3 text-sm font-medium text-amber-600 shadow hover:bg-gray-200 focus:outline-none focus:ring active:text-amber-500 sm:w-auto"
                    >
                        Register
                    </a>
                @endif
            @endauth
    @endif
        </div>
        </div>
    </div>
</section>

            </div>
        </div>
    </div>
</body>
</html>