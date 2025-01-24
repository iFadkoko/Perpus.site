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

    <div class="flex justify-between ">
        <div class="bg-white w-1/2 p-4 rounded-xl shadow-xl m-0 md:m-6 mt-10 font-bold">
            <h2>
                <i class="fa-solid fa-book fa-xl text-black text-sm mr-0 md:mr-2"></i> 
            Collection e-books</h2>
        </div>
        <div class="w-1/2">
            <form action="{{ route('ebooks.filter') }}" method="POST">
                @csrf
                <div class="bg-white rounded-md shadow-xl m-1 md:m-6 mt-10 font-bold">
                    <x-input-label for="kategori" :value="__('Filter')" class="pl-1 font-bold"/>
                    <select class="text-gray-500" name="kategori" id="kategori" onchange="this.form.submit()">
                        <option value="" disabled selected>Pilih Kategori</option>
                        <option value="Teknologi Komputer">Teknologi Komputer</option>
                        <option value="Administrasi Perkantoran">Administrasi Perkantoran</option>
                        <option value="Akutansi">Akutansi</option>
                        <option value="Perbankan">Perbankan</option>
                        <option value="Perhotelan">Perhotelan</option>
                        <option value="Novel">Novel</option>
                        <option value="Komik">Komik</option>
                    </select>
                    <x-input-error :messages="$errors->get('kategori')" class="mt-2" />
                    <a href="{{ route('ebooks') }}" class="p-0.5 md:p-0.5 h-7 text-sm text-gray-500 rounded hover:bg-gray-600 hover:text-white">Reset Filter</a>
                </div> 
            </form>
        </div>
        
    </div>

    <div class="flex flex-wrap">
        @if ($ebooks->count() > 0)
        @foreach ( $ebooks->reverse() as $item)
            <div class=" m-1 md:m-5">
                <div class="bg-slate-100 p-2 rounded-lg w-96 h-58  place-items-center shadow-xl flex">
                    <div class="">
                        <img src="{{ $item->cover_ebook ? asset('storage/' . $item->cover_ebook) : asset('images/default.jpg') }}" alt="{{ $item->judul_ebook }}" class="h-32 m-3 rounded-md">
                    </div>
                    <div class="bg-white p-2 rounded-md text-start font-sans h-32 w-56">
                        <h3 class="text-black font-bold">{{ $item->judul_ebook }}</h3>
                        <a href="#" class="mr-3">{{ $item->kategori }}</a>
                        <p class="text-gray-500 mb-3">{{$item->created_at->diffForHumans()}}</p>
                        <div class="flex">
                            <a class="px-3 py-1 text-sm text-white bg-blue-500 rounded hover:bg-blue-600 mr-3" href="{{ $item->link_ebook }}"   
                                target="_blank" 
                                rel="noopener noreferrer">Mulai Membaca</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <p class="text-gray-500 m-6">Tidak ada ebooks dengan kategori yang dipilih.</p>
        @endif
    </div>
</x-app-layout>

