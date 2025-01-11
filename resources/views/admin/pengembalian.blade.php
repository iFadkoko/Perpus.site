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
                {{ __('Admin Peminjaman') }}
            </h2>
        </div>
    </x-slot>

    <div class="container relative flex flex-col justify-between h-full max-w-5xl px-6 mx-auto xl:px-0 mt-4">
        <h2 class="mb-2 text-2xl font-bold leading-tight text-gray-900 pb-3">Data Pengembalian</h2>    
        <div class="w-full bg-white p-10 rounded-xl shadow-xl">
            <div class="flex flex-col w-full mb-6 sm:flex-row">
            </div>
        </div>
    </div>
</x-app-layout>