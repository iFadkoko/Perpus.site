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
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Peminjaman') }}
        </h2>
    </x-slot>

    <div class=" m-1 md:m-5 flex items-center shadow-xl w-52 rounded-lg">
        <p href="" class="bg-green-500 p-2 rounded-lg text-lg text-white">
            <i class="fa-regular fa-file font-semibold">+</i>
        </p>
        <p class="border-b-2 border-green-400 p-2 ml-3 rounded-lg">From Peminjaman</p>
    </div>

    <div class="container relative flex-col  h-full max-w-5xl mx-auto xl:px-0 mt-6 w-screen">  
        <div class="w-full bg-white p-10 rounded-xl shadow-xl">
            <div class="flex flex-wrap-reverse mb-6 sm:flex-row">
            </div>

            <form action="{{ route('upload.user.peminjaman') }}" method="POST" enctype="multipart/form-data">
                @csrf
                


                <div x-data="bookDropdown()" class="flex w-full max-w-xs flex-col gap-1">
                    <label for="buku_id" class="w-fit pl-0.5 text-sm text-black">Buku</label>
                    <div class="relative">
                        <button type="button" class="inline-flex w-full items-center justify-between gap-2 border border-green-300 rounded-md  px-4 py-2 text-sm font-medium tracking-wide text-neutral-600 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black"
                            x-on:click="isOpen = ! isOpen" x-bind:aria-expanded="isOpen">
                            <span x-text="selectedOption ? selectedOption.label : 'Please Select'"></span>
                        </button>
                        <input id="buku_id" name="buku_id" x-ref="hiddenTextField" hidden />
                        <div x-show="isOpen" class="absolute left-0 top-11 z-10 w-full bg-neutral-50 border border-green-300 rounded-md shadow-md">
                            <input type="text" x-ref="searchField" x-on:input="filterOptions($event.target.value)" placeholder="Search" class="w-full px-2 py-1" />
                            <ul>
                                <template x-for="option in filteredOptions" :key="option.value">
                                    <li class="px-4 py-2 hover:bg-gray-200" x-text="option.label" x-on:click="selectOption(option)"></li>
                                </template>
                            </ul>
                        </div>
                    </div>
                </div>
                <script>
                    function bookDropdown() {
                        return {
                            allOptions: [
                                @forelse ($buku as $item)
                                    { label: '{{ $item->id }}. {{ $item->judul_buku }}', value: '{{ $item->id }}' },
                                @empty
                                    { label: 'No Books Available', value: null },
                                @endforelse
                            ],
                            filteredOptions: [],
                            isOpen: false,
                            selectedOption: null,
                            filterOptions(query) {
                                this.filteredOptions = this.allOptions.filter(option => option.label.toLowerCase().includes(query.toLowerCase()));
                            },
                            selectOption(option) {
                                this.selectedOption = option;
                                this.isOpen = false;
                                this.$refs.hiddenTextField.value = option.value;
                            },
                            init() {
                                this.filteredOptions = this.allOptions;
                            },
                        };
                    }
                </script>
                

                <div class="mt-4 shadow-xl  bg-slate-100 rounded-md w-full p-3 md:w-52">
                    <x-input-label for="durasi_pinjam" :value="__('Durasi Pinjam')" />
                    <x-text-input id="durasi_pinjam" class="block mt-1 w-full" type="date" name="durasi_pinjam"/>
                </div>


                <x-primary-button class="mt-4">
                    {{ __('Upload') }}
                </x-primary-button>
            </form>

            
        </div>
    </div>

    <div class="container mx-auto">
        <div class="font-bold">
            <h3 class="text-3xl pt-3 pl-4 pb-3 font-bold border-b-black border-2 shadow-lg rounded-lg mt-5 mb-3">
                Data Peminjaman buku
            </h3>
        </div> 
        <div class="w-full bg-white p-10 rounded-xl shadow-xl">
            <div class="w-full mb-6 sm:flex-row">
                <table class="w-full border-collapse border text-center text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-5">Cover</th>
                            <th class="p-5">Nama Member</th>
                            <th class="p-5">Judul Buku</th>
                            <th class="p-5">Tanggal Pinjam</th>
                            <th class="p-5">Schedule Kembali</th>
                            <th class="p-5">Status Pinjam</th>
                            <th class="p-5">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($peminjaman as $item)
                            <tr class="border-b">
                                <td class="p-5">
                                    <img 
                                        src="{{ asset('storage/' . $item->buku->cover_buku) }}" 
                                        alt="Cover Buku" 
                                        class="m-2 w-10 h-10 rounded-lg object-cover">
                                </td>

                                <td class="p-5 border">{{ $item->user->name ?? 'User Tidak Ditemukan' }}</td>
                                <td class="p-5 border">{{ $item->buku->judul_buku ?? 'Buku Tidak Ditemukan' }}</td>                
                                <td class="p-5 border">{{ $item->created_at->format('Y-m-d') }}</td>
                                <td class="p-5 border">{{ $item->durasi_pinjam }}</td>
                                <td class="p-5 border">
                                    <p class="{{ $item->status == 'request' ? 'text-green-700 animate-pulse' : 'text-gray-700' }}">
                                        {{ ucfirst($item->status) }}
                                    </p>
                                </td>
                                <td class="p-5 border">
                                    <div class="flex gap-2 justify-center">
                                        <a href="{{ route('admin.peminjaman.detail', $item->id) }}" 
                                           class="px-3 py-1 text-sm text-white bg-sky-500 rounded hover:bg-sky-600">
                                           Detail
                                        </a>
                                        <a href="{{ route('admin.peminjaman.komfirmasi', $item->id) }}" 
                                           class="px-3 py-1 text-sm text-white bg-green-500 rounded hover:bg-green-600">
                                           Komfirmasi
                                        </a>
                                        <form action="{{ route('admin.peminjaman.destroy', $item->id) }}" method="POST" 
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="px-3 py-1 text-sm text-white bg-red-500 rounded hover:bg-red-600">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="p-5 text-center text-gray-500">
                                    Tidak ada data peminjaman saat ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    

</x-app-layout>





