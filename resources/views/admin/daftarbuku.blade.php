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
<div class="w-full">
    <div class="m-5 flex items-center shadow-xl w-auto rounded-lg">
        <p href="" class="bg-amber-500 p-2 rounded-lg text-lg text-white">
            <i class="fa-regular fa-file font-semibold">+</i>
        </p>
        <p class="border-b-2 border-amber-400 p-2 ml-3 rounded-lg">From Tambah Buku</p>
    </div>
  
        <div class="w-full bg-white p-10 rounded-xl shadow-xl">
            <div class="flex flex-wrap-reverse mb-6 sm:flex-row">
            </div>
            <form action="{{ Route('upload.buku') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <input type="file" name="cover_buku" accept="image/*" id="cover_buku">
                </div>

                <div class="mt-4 shadow-xl  bg-slate-100 rounded-md ">
                    <x-input-label for="judul_buku" :value="__('Judul Buku')" />
                    <x-text-input id="judul_buku" class="block mt-1 w-full" type="text" name="judul_buku"/>
                </div>
                

                <div class="mt-4 shadow-xl  bg-slate-100 rounded-md">
                    <x-input-label for="penerbit" :value="__('Penerbit')" />
                    <x-text-input id="penerbit" class="block mt-1 w-full" type="text" name="penerbit"/>
                </div>

                <div class="mt-4 shadow-xl  bg-slate-100 rounded-md">
                    <x-input-label for="penulis" :value="__('Penulis')" />
                    <x-text-input id="penulis" class="block mt-1 w-full" type="text" name="penulis"/>
                </div>

                <div class="mt-4 shadow-xl  bg-slate-100 rounded-md">
                    <x-input-label for="isbn" :value="__('ISBN')" />
                    <x-text-input id="isbn" class="block mt-1 w-full" type="text" name="isbn"/>
                </div>

                <div class="mt-4 shadow-xl  bg-slate-100 rounded-md">
                    <x-input-label for="stok" :value="__('Stok Buku')" />
                    <x-text-input id="stok" class="block mt-1 w-full" type="text" name="stok"/>
                </div>

                <div class="mb-3 mt-4  bg-slate-100 rounded-md shadow-xl">
                    <x-input-label for="katagori" :value="__('Kategori')" />
                        <select class="text-gray-500" name="kategori">
                            <option value="0" disabled selected>Pilih katagori</option>
                            <option value="Teknologi Komputer">Teknologi Komputer</option>
                            <option value="Administrasi Perkantoran">Administrasi Perkantoran</option>
                            <option value="Akutansi">Akutansi</option>
                            <option value="Perbankan">Perbankan</option>
                            <option value="Perhotelan">Perhotelan</option>
                            <option value="Novel">Novel</option>
                            <option value="Komik">Komik</option>
                            
                        </select>
                    <x-input-error :messages="$errors->get('katagori')" class="mt-2" />
                </div>

                <x-primary-button class="mt-4">
                    {{ __('Upload') }}
                </x-primary-button>
            </form>
        </div>
    </div>


<div class="flex justify-between ">
    <div class="bg-white w-52 p-3 rounded-xl shadow-xl m-6 mt-10 font-bold">
        <h2>
            <i class="fa-solid fa-book fa-xl text-black mr-2"></i> 
        Collection buku</h2>
    </div>
    <div>
        <div class="  bg-white  rounded-md shadow-xl m-6 mt-10 font-bold">
            <x-input-label for="katagori" :value="__('Filter')" class="pl-1 font-bold"/>
                <select class="text-gray-500" name="kategori">
                    <option value="0" disabled selected>Pilih Kategori</option>
                    <option value="Teknologi Komputer">Teknologi Komputer</option>
                    <option value="Administrasi Perkantoran">Administrasi Perkantoran</option>
                    <option value="Akutansi">Akutansi</option>
                    <option value="Perbankan">Perbankan</option>
                    <option value="Perhotelan">Perhotelan</option>
                    <option value="Novel">Novel</option>
                    <option value="Komik">Komik</option>
                    
                </select>
            <x-input-error :messages="$errors->get('katagori')" class="mt-2" />
        </div>

    </div>
</div>


    <div class="flex flex-wrap w-full">
        @foreach ( $bukus->reverse() as $item)
            <div class="m-3">
                <div class="bg-slate-200 p-2 rounded-lg w-80 h-5*  place-items-center shadow-xl flex">
                    <div class="">
                        <img src="{{ $item->cover_buku? asset('storage/' . $item->cover_buku) : asset('images/default.jpg') }}" alt="{{ $item->judul_buku }}" class="h-32 m-3 rounded-md">
                    </div>
                    <div class="bg-white p-2 rounded-md text-start font-sans h-auto w-56">
                        <h3 class="text-black font-bold">{{ $item->judul_buku }}</h3>
                        <a href="#" class="mr-3">{{ $item->kategori }}</a>
                        <p class="text-gray-500 mb-3">{{$item->created_at->diffForHumans()}}</p>
                        <div class="flex">
                            <a class="px-3 py-1 text-sm text-white bg-blue-500 rounded hover:bg-blue-600 mr-3" href="{{ Route('detail.buku', $item->id) }}"   
                                >Detail Buku</a>
                                <form action="{{ route('destroy.buku', $item->id) }}" method="POST" onsubmit="return confirm('apakah anda yakin ingin menghapus buku ini?');">
                                    @csrf
                                    @method('DELETE')
                                  <button type="submit" class="px-3 py-1 text-sm text-white bg-red-500 rounded hover:bg-red-600">Delete</button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
</div>
</x-app-layout>

