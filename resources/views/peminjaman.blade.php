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





