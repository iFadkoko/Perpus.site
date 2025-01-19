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

    <div class="container">
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
            </div>
        
            <div class="card mt-4 bg-white drop-shadow-xl rounded-lg border-b-4 border-red-400 p-3">
                <div class="card-header font-bold">Data User</div>
                <div class="card-body">
                    <p><strong>Nama:</strong> {{ $peminjaman->user->name }}</p>
                    <p><strong>NIM:</strong> {{ $peminjaman->user->nim }}</p>
                    <p><strong>Email:</strong> {{ $peminjaman->user->email }}</p>
                    <p><strong>Alamat:</strong> {{ $peminjaman->user->prodi }}</p>
                    <p><strong>Telepon:</strong> {{ $peminjaman->user->no_Telepon }}</p>
                </div>
            </div>
        
            <div class="card mt-4 bg-white drop-shadow-xl rounded-lg border-b-4 border-blue-400 p-3">
                <div class="card-header font-bold">Data Buku</div>
                <div class="card-body">
            <p><strong>Judul Buku:</strong> {{ $peminjaman->buku->judul_buku }}</p>
            <p><strong>Penerbit:</strong> {{ $peminjaman->buku->penerbit }}</p>
            <p><strong>Penulis:</strong> {{ $peminjaman->buku->penulis }}</p>
            <p><strong>ISBN:</strong> {{ $peminjaman->buku->isbn }}</p>
            <p><strong>Kategori:</strong> {{ $peminjaman->buku->kategori }}</p>
            
                </div>
            </div>
        </div>
        <a href="{{ route('admin.peminjaman') }}" class="btn btn-primary mt-4 bg-red-500 text-white p-3 rounded-lg hover:bg-slate-600">Kembali</a>
    </div>
</x-app-layout>