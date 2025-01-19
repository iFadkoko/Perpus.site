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
    <div class="flex w-4/4">
        <div class="container ">
            <h1 class="text-xl font-bold m-3 bg-white rounded-lg shadow-xl text-center w-80">Detail Buku</h1>
            <a class="px-3 py-1 text-sm text-white bg-blue-500 rounded hover:bg-blue-600 mr-3 m-3 " href="{{ Route('admin.daftarbuku') }}"   
                >Kembali</a>
            <div class="card bg-white shadow-xl p-10 m-3 rounded-lg w-80">
                <div class="card-header">
                    <h2 class=" font-bold text-xl mb-3 bg-white shadow-2xl p-2 rounded-lg">{{ $buku->judul_buku }}</h2>
                </div>
                <div class="card-body">
                    @if ($buku->cover_buku)
                        <img src="{{ asset('storage/' . $buku->cover_buku) }}" alt="Cover Buku" style="max-width: 200px;" class="rounded-md drop-shadow-xl">
                    @endif
                    <div class="bg-white drop-shadow-2xl p-2 rounded-lg mt-2">
                        <p class="mt-2"><strong>Kategori:</strong> {{ $buku->kategori }}</p>
                        <p class=""><strong>Penerbit:</strong> {{ $buku->penerbit }}</p>
                        <p class=""><strong>Penulis:</strong> {{ $buku->penulis }}</p>
                        <p class=""><strong>ISBN:</strong> {{ $buku->isbn }}</p>
                        <p class=""><strong>Stok:</strong> {{ $buku->stok }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>