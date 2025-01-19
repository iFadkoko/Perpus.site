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
                {{ __('Daftar Buku') }}
            </h2>
        </div>
        
    </x-slot>

    

    <div>
        <div class="bg-white w-52 p-3 rounded-xl shadow-xl m-6 mt-10 font-bold">
            <h2>
                <i class="fa-solid fa-book fa-xl text-black mr-2"></i> 
            Collection Book</h2>
        </div>
        <div>
        </div>
    </div>

    <div class="flex flex-wrap">
        @foreach ( $bukus->reverse() as $item)
            <div class="m-5">
                <div class="bg-slate-200 p-2 rounded-lg w-96 h-58  place-items-center shadow-xl flex">
                    <div class="">
                        <img src="{{ $item->cover_buku ? asset('storage/' . $item->cover_buku) : asset('images/default.jpg') }}" alt="{{ $item->judul_buku }}" class="h-32 m-3 rounded-md">
                    </div>
                    <div class="bg-white p-2 rounded-md text-start font-sans h-32 w-56">
                        <h3 class="text-black font-bold">{{ $item->judul_buku }}</h3>
                        <a href="#" class="mr-3">{{ $item->penerbit }}</a>
                        <p class="text-gray-500 mb-3">{{$item->created_at->diffForHumans()}}</p>
                        <div class="flex">
                            <a class="px-3 py-1 text-sm text-white bg-blue-500 rounded hover:bg-blue-600 mr-3" href="{{ Route('user.buku', $item->id) }}">Detail Buku</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
</x-app-layout>

