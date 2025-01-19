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

    <div class="">
        <h2 class="mb-2 mt-10 pt-5 text-2xl font-bold leading-tight text-gray-900 pb-3">Data member yang sedang meminjam</h2>    
        <div class="w-auto bg-white p-10 rounded-xl shadow-xl overflow-scroll h-96">
            <div class=" w-full mb-6 sm:flex-row flex flex-wrap justify-center">
                <table class="border text-center">
                    <thead class="border">
                        <tr class="bg-gray-100 ">
                            <td class="p-5"></td>
                            <td class="p-5">Nama Member</td>
                            <td class="p-5">Judul Buku</td>
                            <td class="p-5">Tanggal Pinjam</td>
                            <td class="p-5">Durasi Pinjam</td>
                            <td class="p-5">Status Pinjam</td>
                            <td class="p-5">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                @forelse ( $peminjaman->where('status', 'pinjam') as $item)
                        <tr>
                            <td><img src="{{ asset('storage/' . $item->buku->cover_buku) }}" alt="" class=" m-2 w-6 h-6 rounded-lg object-cover"></td>
                            <td>{{ $item->user->name ?? 'User Tidak Ditemukan' }}</td>
                            <td>{{ $item->buku->judul_buku ?? 'Buku Tidak Ditemukan' }}</td>
                            <td>{{ $item->created_at->Format('Y-m-d')}}</td>
                            <td>{{ $item->durasi_pinjam}}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <div class="flex gap-1 m-4">
                                    <a href="{{ route('admin.pengembalian.accept', $item->id) }}" class=" px-3 py-1 text-sm text-white bg-green-500 rounded hover:bg-sky-600">accept</a>
                                    <form action="{{ route('admin.peminjaman.destroy', $item->id) }}" method="POST" onsubmit="return confirm('apakah anda yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                      <button type="submit" class="px-3 py-1 text-sm text-white bg-red-500 rounded hover:bg-red-600">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h2 class="mb-2 text-2xl font-bold leading-tight text-gray-900 pb-3">Data member yang Sudah Kembalikan Buku</h2>    
        <div class="w-full bg-white p-10 rounded-xl shadow-xl">
            <div class=" w-full mb-6 sm:flex-row">
                <table class="border text-center">
                    <thead class="border">
                        <tr class="bg-gray-100 ">
                            <td class="p-5"></td>
                            <td class="p-5">Nama Member</td>
                            <td class="p-5">Judul Buku</td>
                            <td class="p-5">Tanggal Pinjam</td>
                            <td class="p-5">Pinjam Berakhir</td>
                            <td class="p-5">Tanggal Kembali</td>
                            <td class="p-5">Denda</td>
                            <td class="p-5">Status Pinjam</td>
                            <td class="p-5">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                @forelse ( $peminjaman->where('status', 'kembali') as $item)
                        <tr>
                            <td><img src="{{ asset('storage/' . $item->buku->cover_buku) }}" alt="" class=" m-2 w-6 h-6 rounded-lg object-cover"></td>
                            <td>{{ $item->user->name ?? 'User Tidak Ditemukan' }}</td>
                            <td>{{ $item->buku->judul_buku ?? 'Buku Tidak Ditemukan' }}</td>
                            <td>{{ $item->created_at->Format('Y-m-d')}}</td>
                            <td>{{ $item->durasi_pinjam}}</td>
                            <td >{{ $item->tgl_kembali }}</td>
                            <td>RP {{ $item->denda}}.000</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <div class="flex gap-1 ">
                                    <a href="{{ route('admin.peminjaman.detail', $item->id) }}" class=" px-3 py-1 text-sm text-white bg-sky-500 rounded hover:bg-sky-600">detail</a>
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
                    <h3 class="text-center m-5">Data Kosong</h3>
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>


</x-app-layout>