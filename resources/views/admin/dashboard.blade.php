<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<x-app-layout>
    <x-slot name="header">
        <div x-data="{ showHeader: true }" class="flex items-center"
        class="items-start">
            <div>
                <a href="javascript:void(0)" @click="showHeader = !showHeader">
                    <i class="fa-solid fa-bars mr-3 fa-sm"></i>
                </a>
            </div>
            <h2
                class="text-xs text-white leading-tight" 
                x-show="showHeader" 
                x-transition
            >
                {{ __('Admin Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class=" font-bold">
        <h3 class=" text-3xl pt-3 pl-4 pb-3 text-bold border-b-black border-2 shadow-lg rounded-lg">Dashboard</h3>
    </div>

<div class="flex flex-wrap">
    <div x-data="{ hovered: false }" class="m-3 flex items-start shadow-2xl w-80 h-40 rounded-lg border-red-700 border-r-2  ease-in-out transition-transform duration-300" 
    @mouseenter="hovered = true" 
    @mouseleave="hovered = false" :class="hovered ? ' scale-110 p-2' : 'text-red-600 p-1'" >
        <div class="w-1/3 h-full flex justify-center">
            <p class="bg-red-700 p-2 rounded-lg text-lg text-white h-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-20 mt-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75h1.5m9 0h-9" />
                </svg>
            </p>
        </div>
        <div class="flex flex-col items-start m-3">
            <a 
                href="{{ route('admin.ebooks') }}" 
                @mouseenter="hovered = true" 
                @mouseleave="hovered = false" 
                :class="hovered ? 'bg-red-700 text-white scale-110 p-2' : 'text-red-600 p-1'" 
                class="rounded-md ease-in-out transition-transform duration-300">
                Jumlah e-Book
            </a>
            <p class="animate-pulse text-red-600 p-1">{{ $totalebook }}</p>
        </div>
    </div>

    <div x-data="{ hovered: false }" class="m-3 flex items-start shadow-2xl w-80 h-40 rounded-lg border-amber-700 border-r-2 ease-in-out transition-transform duration-300" 
    @mouseenter="hovered = true" 
    @mouseleave="hovered = false" :class="hovered ? ' scale-110 p-2' : 'text-amber-600 p-1'">
        <div class=" w-1/3 h-full flex justify-center ">
        <p class="bg-amber-600 p-2 rounded-lg text-lg text-white h-full">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-20 mt-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6.878V6a2.25 2.25 0 0 1 2.25-2.25h7.5A2.25 2.25 0 0 1 18 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 0 0 4.5 9v.878m13.5-3A2.25 2.25 0 0 1 19.5 9v.878m0 0a2.246 2.246 0 0 0-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0 1 21 12v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6c0-.98.626-1.813 1.5-2.122" />
              </svg> 
              
            </p>
        </div>
        <div class=" flex flex-col items-start m-3 "> 
            <a href="{{ route('admin.daftarbuku') }}" 
            @mouseenter="hovered = true" 
            @mouseleave="hovered = false" 
            :class="hovered ? 'bg-amber-700 text-white scale-110 p-2' : 'text-amber-600 p-1'" 
            class="rounded-md ease-in-out transition-transform duration-300">Jumlah Buku yang ada di perpustakaan</a>
            <p class="animate-pulse text-amber-600 p-1 text-bold">{{ $totalBuku }}</p>
        </div>
    </div>

    <div x-data="{ hovered: false }" class="m-3 flex items-start shadow-2xl w-80 h-40 rounded-lg border-green-700 border-r-2 ease-in-out transition-transform duration-300" 
    @mouseenter="hovered = true" 
    @mouseleave="hovered = false" :class="hovered ? ' scale-110 p-2' : 'text-green-600 p-1'">
        <div class=" w-1/3 h-full flex justify-center ">
        <p class="bg-green-600 p-2 rounded-lg text-lg text-white h-full">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-20 mt-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
              </svg>
                 
            </p>
        </div>
        <div class=" flex flex-col items-start m-3 "> 
            <a href="{{ route('admin.peminjaman') }}" 
            @mouseenter="hovered = true" 
            @mouseleave="hovered = false" 
            :class="hovered ? 'bg-green-700 text-white scale-110 p-2' : 'text-green-600 p-1'" 
            class="rounded-md ease-in-out transition-transform duration-300">Jumlah Buku Yang Sedang di Minta Pinjam</a>
            <p class="animate-pulse text-green-600 p-1 text-bold">{{ $peminjamanRequest }}</p>
        </div>
    </div>

    <div x-data="{ hovered: false }" class="m-3 flex items-start shadow-2xl w-80 h-40 rounded-lg border-sky-700 border-r-2 ease-in-out transition-transform duration-300" 
    @mouseenter="hovered = true" 
    @mouseleave="hovered = false" :class="hovered ? ' scale-110 p-2' : 'text-sky-600 p-1'">
        <div class=" w-1/3 h-full flex justify-center ">
        <p class="bg-sky-600 p-2 rounded-lg text-lg text-white h-full">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-20 mt-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
              </svg>    
            </p>
        </div>
        <div class=" flex flex-col items-start m-3 "> 
            <a href="{{ route('admin.pengembalian') }}" 
            @mouseenter="hovered = true" 
            @mouseleave="hovered = false" 
            :class="hovered ? 'bg-sky-700 text-white scale-110 p-2' : 'text-sky-600 p-1'" 
            class="rounded-md ease-in-out transition-transform duration-300">Jumlah Buku Yang Sedang diPinjam</a>
            <p class="animate-pulse text-sky-600 p-1 text-bold">{{ $peminjamanPinjam }}</p>
        </div>
    </div>

    <div x-data="{ hovered: false }" class="m-3 flex items-start shadow-2xl w-80 h-40 rounded-lg border-indigo-700 border-r-2 ease-in-out transition-transform duration-300" 
    @mouseenter="hovered = true" 
    @mouseleave="hovered = false" :class="hovered ? ' scale-110 p-2' : 'text-indigo-600 p-1'">
        <div class=" w-1/3 h-full flex justify-center ">
        <p class="bg-indigo-600 p-2 rounded-lg text-lg text-white h-full">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-20 mt-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
              </svg>              
            </p>
        </div>
        <div class=" flex flex-col items-start m-3 "> 
            <a href="{{ route('admin.pengembalian') }}" 
            @mouseenter="hovered = true" 
            @mouseleave="hovered = false" 
            :class="hovered ? 'bg-indigo-700 text-white scale-110 p-2' : 'text-indigo-600 p-1'" 
            class="rounded-md ease-in-out transition-transform duration-300">Jumlah Buku Yang Sedang di Sudah Kembali</a>
            <p class="animate-pulse text-indigo-600 p-1 text-bold">{{ $peminjamanKembali }}</p>
        </div>
    </div>

    <div x-data="{ hovered: false }" class="m-3 flex items-start shadow-2xl w-80 h-40 rounded-lg border-indigo-700 border-r-2 ease-in-out transition-transform duration-300" 
    @mouseenter="hovered = true" 
    @mouseleave="hovered = false" :class="hovered ? ' scale-110 p-2' : 'text-indigo-600 p-1'">
        <div class=" w-1/3 h-full flex justify-center ">
        <p class="bg-indigo-600 p-2 rounded-lg text-lg text-white h-full">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-20 mt-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
              </svg>
                         
            </p>
        </div>
        <div class=" flex flex-col items-start m-3 "> 
            <a href="{{ route('admin.kelolauser') }}" 
            @mouseenter="hovered = true" 
            @mouseleave="hovered = false" 
            :class="hovered ? 'bg-indigo-700 text-white scale-110 p-2' : 'text-indigo-600 p-1'" 
            class="rounded-md ease-in-out transition-transform duration-300">Jumlah User</a>
            <p class="animate-pulse text-indigo-600 p-1 text-bold">{{ $totalUser}}</p>
        </div>
    </div>
</div>    


</x-app-layout>
