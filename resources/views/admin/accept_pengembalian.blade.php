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

<h1 class="card bg-white drop-shadow-xl rounded-lg border-b-4 border-indigo-400 m-2 p-1">Detail Peminjaman</h1>
<div class="flex gap-5 items-start">
    <div class="card mt-4 bg-white drop-shadow-xl rounded-lg border-b-4 border-green-400 p-3">
        <div class="card-header font-bold">Informasi Peminjaman</div>
        <div class="card-body">
            <p><strong>ID Peminjaman:</strong> {{ $peminjaman->id }}</p>
            <p><strong>Tanggal Peminjaman:</strong> {{ $peminjaman->created_at->format('d M Y') }}</p>
            <p><strong>Durasi Pinjam:</strong> {{ \Carbon\Carbon::parse($peminjaman->durasi_pinjam)->translatedFormat('d M Y') }}</p>
            <p><strong>Status:</strong> {{ ucfirst($peminjaman->status) }}</p>
        </div>
        <form action="{{ route('admin.peminjaman.accepted', $peminjaman->id) }}" method="POST">
            @csrf
            <button type="submit" class="px-3 py-1 text-sm text-white bg-green-500 rounded hover:bg-green-600">Accept</button>
        </form>
    </div>
</x-app-layout>