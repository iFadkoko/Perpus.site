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
                {{ __('Admin E-Books') }}
            </h2>
        </div>
    </x-slot class="">
    <div class="container relative flex-col  h-full max-w-5xl px-6 mx-auto xl:px-0 mt-4 w-100">
        <h2 class="mb-2 text-2xl font-bold leading-tight text-gray-900 pb-3">Setting E-books</h2>    
        <div class="w-full bg-white p-10 rounded-xl shadow-xl">
            <div class="flex flex-wrap-reverse mb-6 sm:flex-row">
            </div>
            <form action="{{ Route('upload.ebook') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <input type="file" name="cover_ebook" accept="image/*">
                </div>

                <div class="mt-4 shadow-xl  bg-slate-100 rounded-md ">
                    <x-input-label for="judul_ebook" :value="__('Judul ebook')" />
                    <x-text-input id="judul_ebook" class="block mt-1 w-full" type="text" name="judul_ebook"/>
                </div>
                
                <div class="mt-4 shadow-xl  bg-slate-100 rounded-md">
                    <x-input-label for="kategori" :value="__('Categori')" />
                    <x-text-input id="kategori" class="block mt-1 w-full" type="text" name="kategori"/>
                </div>

                <div class="mt-4 shadow-xl  bg-slate-100 rounded-md">
                    <x-input-label for="jumlah_halaman" :value="__('Jumlah Halaman')" />
                    <x-text-input id="jumlah_halaman" class="block mt-1 w-full" type="text" name="jumlah_halaman"/>
                </div>
                <x-primary-button class="mt-4">
                    {{ __('Upload') }}
                </x-primary-button>
            </form>
        </div>
    </div>

<div class="bg-slate-200 w-40 p-3 rounded-xl shadow-xl m-6 mt-10">
    <h2>Collection ebook</h2>
</div>

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
    </div>
</x-app-layout>


