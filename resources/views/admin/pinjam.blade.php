<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
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
                    <a href="{{ route('admin.peminjaman') }}" @click="showHeader = !showHeader">
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
                    <a href="{{ route('admin.peminjaman.pinjam') }}" @click="showHeader = !showHeader">
                        <i class="fa-regular fa-file mr-3 fa-lg"></i>
                    </a>
                </div>
                <a>
                    From peminjaman
                <a>
            </div>
        </div>
    </x-slot>

    <div class="m-5 flex items-center shadow-xl w-52 rounded-lg">
        <p href="" class="bg-green-500 p-2 rounded-lg text-lg text-white">
            <i class="fa-regular fa-file font-semibold">+</i>
        </p>
        <p class="border-b-2 border-green-400 p-2 ml-3 rounded-lg">From Peminjaman</p>
    </div>

    <div class="container relative flex-col  h-full max-w-5xl px-6 mx-auto xl:px-0 mt-4 w-screen">
        <h2 class="mb-2 text-2xl font-bold leading-tight text-gray-900 pb-3">Setting E-books</h2>    
        <div class="w-full bg-white p-10 rounded-xl shadow-xl">
            <div class="flex flex-wrap-reverse mb-6 sm:flex-row">
            </div>

            <form action="{{ Route('admin.peminjaman.pinjam') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div x-data="userDropdown()" class="flex w-full max-w-xs flex-col gap-1">
                    <label for="User_id" class="w-fit pl-0.5 text-sm text-black">User</label>
                    <div class="relative">
                        <button type="button" class="inline-flex w-full items-center justify-between gap-2 border border-indigo-300 rounded-md bg-white px-4 py-2 text-sm font-medium tracking-wide text-neutral-600 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black"
                            x-on:click="isOpen = ! isOpen" x-bind:aria-expanded="isOpen">
                            <span x-text="selectedOption ? selectedOption.label : 'Please Select'"></span>
                        </button>
                        <input id="user_id" name="user_id" x-ref="hiddenTextField" hidden />
                        <div x-show="isOpen" class="absolute left-0 top-11 z-10 w-full bg-indigo-50 border border-indigo-300 rounded-md shadow-md">
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
                    function userDropdown() {
                        return {
                            allOptions: [
                                @forelse ($user as $item)
                                    { label: '{{ $item->id }}. {{ $item->name }}', value: '{{ $item->id }}' },
                                @empty
                                    { label: 'No Users Available', value: null },
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
                

                <div class="mt-4 shadow-xl  bg-slate-100 rounded-md">
                    <x-input-label for="durasi_pinjam" :value="__('Durasi Pinjam')" />
                    <x-text-input id="durasi_pinjam" class="block mt-1 w-full" type="date" name="durasi_pinjam"/>
                </div>


                <x-primary-button class="mt-4">
                    {{ __('Upload') }}
                </x-primary-button>
            </form>

            
        </div>
    </div>
</x-app-layout>

