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
        <div class="flex flex-col">
            <div x-data="{ showHeader: true }" class="flex items-center"
            class="items-start">
                <div>
                    <a href="javascript:void(0)" @click="showHeader = !showHeader">
                        <i class="fa-solid fa-bars mr-3 fa-lg"></i>
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
            <div x-data="{ showHeader: true }" class="flex items-center mt-3"
            class="items-start">
                <div>
                    <a href="{{ route('admin.peminjaman.form') }}" @click="showHeader = !showHeader">
                        <i class="fa-regular fa-file mr-3 fa-lg"></i>
                    </a>
                </div>
                <a>
                    From peminjaman
                <a>
            </div>
        </div>
    </x-slot>

    <div class="">
        <div class=" font-bold">
            <h3 class=" text-3xl pt-3 pl-4 pb-3 text-bold border-b-black border-2 shadow-lg rounded-lg mb-3">Data Member Yang Sedang Request Buku</h3>
        </div> 
        <div class="w-full bg-white p-10 rounded-xl shadow-xl">
            <div class=" w-full mb-6 sm:flex-row">
                <table class="border text-center text-sm">
                    <thead class="border">
                        <tr class="bg-gray-100 ">
                            <td class="p-5"></td>
                            <td class="p-5">Nama Member</td>
                            <td class="p-5">Judul Buku</td>
                            <td class="p-5">Tanggal Pinjam</td>
                            <td class="p-5">Schedule kembali</td>
                            <td class="p-5">Status Pinjam</td>
                            <td class="p-5">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                @forelse ( $peminjaman as $item)
                        <tr>
                            <td><img src="{{ asset('storage/' . $item->buku->cover_buku) }}" alt="" class=" m-2 w-6 h-6 rounded-lg object-cover"></td>
                            <td class=" border">{{ $item->user->name ?? 'User Tidak Ditemukan' }}</td>
                            <td class=" border">{{ $item->buku->judul_buku ?? 'Buku Tidak Ditemukan' }}</td>
                            <td>{{ $item->created_at->Format('Y-m-d')}}</td>
                            <td>{{ $item->durasi_pinjam}}</td>
                            <td><p class="text-green-700  animate-pulse ">{{ $item->status }}</p></td>
                            <td>
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.peminjaman.detail', $item->id) }}" class=" px-3 py-1 text-sm text-white bg-sky-500 rounded hover:bg-sky-600">detail</a>
                                    <a href="{{ route('admin.peminjaman.komfirmasi', $item->id) }}" class=" px-3 py-1 text-sm text-white bg-green-500 rounded hover:bg-green-600">Komfirmasi</a>
                                    <form action="{{ route('admin.peminjaman.destroy', $item->id) }}" method="POST" onsubmit="return confirm('apakah anda yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                      <button type="submit" class="px-3 py-1 text-sm text-white bg-red-500 rounded hover:bg-red-600">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>
                            </td>
                        </tr>
                    <h3 class="text-center">Data Kosong</h3>
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>
    </div>
<div class="m-5 flex items-center shadow-xl w-52 rounded-lg">
    <a href="{{ route('admin.peminjaman.form') }}" class="bg-green-500 hover:bg-green-900 hover:ease-in-out animate-pulse p-2 rounded-lg text-lg text-white">
        <i class="fa-regular fa-file font-semibold">+</i>
    </a>
    <p class="border-b-2 border-green-400 p-2 ml-3 rounded-lg animate-pulse">From Peminjaman</p>
</div>
</x-app-layout>