<!DOCTYPE html>
<html class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="h-full">
<div class="min-h-full">
    <nav class="bg-indigo-900" x-data="{ isOpen: false }">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <img class="h-8" src="img/logo.png" alt="Your Company">
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="/" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">HOME</a>
                            <a href="/daftar_buku" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">DAFTAR BUKU</a>
                            <a href="/peminjaman" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">PEMINJAMAN</a>
                            <a href="/pengembalian" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">PENGEMBALIAN</a>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-black hover:text-black/70">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black hover:text-black/70">Log in</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black hover:text-black/70">Register</a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </div>
                </div>
                <button type="button" @click="isOpen = !isOpen" class="inline-flex items-center justify-center p-2 text-gray-400 hover:bg-gray-700 hover:text-white">
                    <span class="sr-only">Open main menu</span>
                    <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <div x-show="isOpen" class="md:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                <a href="/" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white">HOME</a>
                <a href="/daftar_buku" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">DAFTAR BUKU</a>
                <a href="/peminjaman" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">PEMINJAMAN</a>
                <a href="/pengembalian" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">PENGEMBALIAN</a>
            </div>
        </div>
    </nav>

    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">HOME</h1>
        </div>
    </header>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-32 rounded-md">
                <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="mx-auto max-w-2xl lg:mx-0">
                        <h2 class="text-5xl font-semibold tracking-tight text-white sm:text-7xl">SELAMAT DATANG</h2>
                        <p class="mt-8 text-lg font-medium text-gray-300">Di Web perpustakaan POLITEKNIK PAJAJARAN. Anda dapat Meminjam atau sekedar melihat-lihat daftar buku.</p>
                    </div>
                    <div class="mx-auto mt-10 max-w-2xl lg:mx-0 lg:max-w-none">
                        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2 md:flex lg:gap-x-10">
                            <a href="#">DAFTAR BUKU <span aria-hidden="true">&rarr;</span></a>
                            <a href="#">PEMINJAMAN BUKU <span aria-hidden="true">&rarr;</span></a>
                            <a href="#">PENGEMBALIAN BUKU <span aria-hidden="true">&rarr;</span></a>
                            <a href="#">TEAM BUILD UP <span aria-hidden="true">&rarr;</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
