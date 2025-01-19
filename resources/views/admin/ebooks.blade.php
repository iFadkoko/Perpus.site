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
<body class="font-sans">
    
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
                {{ __('Admin E-Books') }}
            </h2>
        </div>
    </x-slot >
    <div class="container relative flex-col  h-full max-w-5xl px-6 mx-auto xl:px-0 mt-4 w-100">
        <div class="m-5 flex items-center shadow-xl w-auto rounded-lg">
            <p href="" class="bg-red-500 p-2 rounded-lg text-lg text-white">
                <i class="fa-regular fa-file font-semibold">+</i>
            </p>
            <p class="border-b-2 border-red-400 p-2 ml-3 rounded-lg">From Tambah e-Book</p>
        </div>   
        <div class="w-full bg-white p-10 rounded-xl shadow-xl">
            <div class="flex flex-wrap-reverse mb-6 sm:flex-row">
            </div>
            <form action="{{ Route('upload.ebook') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <input type="file" name="cover_ebook" accept="image/*" id="cover_ebook">
                </div>

                <div class="mt-4 shadow-xl  bg-slate-100 rounded-md ">
                    <x-input-label for="judul_ebook" :value="__('Judul ebook')" />
                    <x-text-input id="judul_ebook" class="block mt-1 w-full" type="text" name="judul_ebook"/>
                </div>
                
                <div class="mb-3 mt-4  bg-slate-100 rounded-md shadow-xl">
                    <x-input-label for="kategori" :value="__('Kategori')" />
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
                    <x-input-error :messages="$errors->get('kategori')" class="mt-2" />
                </div>

                <div class="mt-4 shadow-xl  bg-slate-100 rounded-md">
                    <x-input-label for="jumlah_halaman" :value="__('Jumlah Halaman')" />
                    <x-text-input id="jumlah_halaman" class="block mt-1 w-full" type="text" name="jumlah_halaman"/>
                </div>

                <div class="mt-4 shadow-xl  bg-slate-100 rounded-md">
                    <x-input-label for="link_ebook" :value="__('Link e-book')" />
                    <x-text-input id="link_ebook" class="block mt-1 w-full" type="text" name="link_ebook"/>
                </div>

                <x-primary-button class="mt-4">
                    {{ __('Upload') }}
                </x-primary-button>
            </form>
        </div>
    </div>

    <div class="flex justify-between">
        <div class="bg-white w-52 p-3 rounded-xl shadow-xl m-6 mt-10 font-bold">
            <h2>
                <i class="fa-solid fa-book fa-xl text-black mr-2"></i> 
            Collection e-book</h2>
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

    <div class="flex flex-wrap">
        @foreach ( $ebooks->reverse() as $item)
            <div class="m-5">
                <div class="bg-slate-200 p-2 rounded-lg w-96 h-58  place-items-center shadow-xl flex">
                    <div class="">
                        <img src="{{ $item->cover_ebook ? asset('storage/' . $item->cover_ebook) : asset('images/default.jpg') }}" alt="{{ $item->judul_ebook }}" class="h-32 m-3 rounded-md">
                    </div>
                    <div class="bg-white p-2 rounded-md text-start font-sans h-32">
                        <h3 class="text-black font-bold">{{ $item->judul_ebook }}</h3>
                        <a href="#" class="mr-3">{{ $item->kategori }}</a>
                        <p class="text-gray-500 mb-3">{{$item->created_at->diffForHumans()}}</p>
                        <div class="flex">
                            <a class="px-3 py-1 text-sm text-white bg-blue-500 rounded hover:bg-blue-600 mr-3" href="{{ $item->link_ebook }}"   
                                target="_blank" 
                                rel="noopener noreferrer">Mulai Membaca</a>
                            <form action="{{ route('destroy.ebook', $item->id) }}" method="POST" onsubmit="return confirm('apakah anda yakin ingin menghapus e-book ini?');">
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
</x-app-layout>


</body>
</html>