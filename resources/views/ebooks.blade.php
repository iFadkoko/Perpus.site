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
        <div x-data="{ showHeader: true }" class="flex items-center">
            <a href="javascript:void(0)" @click="showHeader = !showHeader">
                <i class="fa-solid fa-bars mr-3 fa-sm"></i>
            </a>
            <h2 
                class="font-semibold text-xs text-white leading-tight" 
                x-show="showHeader" 
                x-transition
            >
                {{ __('Ebooks') }}
            </h2>
        </div>
        
    </x-slot>

    <h2 class="mb-3 ml-3">Collection E-book</h2>

    <div class="flex">
    @foreach ( $ebooks as $item)
        
        <div class="m-5">
            <div class="bg-slate-200 p-5 rounded-lg w-48 h-58  place-items-center shadow-xl">
                <img src="{{ $item->cover_ebook ? asset('storage/' . $item->cover_ebook) : asset('images/default.jpg') }}" alt="{{ $item->judul_ebook }}" class="w-16 m-3 rounded-md">
                <h3 class="text-black">{{ $item->judul_ebook }}</h3>
                <div class="flex text-xs">
                <a href="#" class="mr-3">{{ $item->kategori }}</a> | <p class="ml-3">{{ $item->created_at->diffForHumans()}}</p>
                </div>
                <button class="text-xs text-white bg-indigo-400 p-0.5 rounded-sm hover:bg-white hover:text-indigo-400 ease-in duration-300" href="#">Mulai Membaca</button>
            </div>
        </div>
        @endforeach
</x-app-layout>

