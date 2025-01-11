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
                {{ __('Kelola User') }}
            </h2>
        </div>
    </x-slot>
<div class="container mx-auto p-4">
    <form action="{{ route('update.kelolauser', $user->id) }}" method="POST" class="bg-white p-6 rounded shadow-md" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                value="{{ old('name', $user->name) }}" 
                class="w-full px-3 py-2 mt-1 border rounded focus:ring-2 focus:ring-blue-500"
                required
            />
        </div>

        <div class="mb-4">
            <label for="nim" class="block text-sm font-medium text-gray-600">Nim</label>
            <input 
                type="text" 
                id="nim" 
                name="nim" 
                value="{{ old('nim', $user->nim) }}" 
                class="w-full px-3 py-2 mt-1 border rounded focus:ring-2 focus:ring-blue-500"
                required
            />
        </div>

        <div class="mb-4">
            <label for="prodi" class="block text-sm font-medium text-gray-600">Prodi</label>
            <select 
                id="prodi" 
                name="prodi" 
                class="w-full px-3 py-2 mt-1 border rounded focus:ring-2 focus:ring-blue-500"
                required
            >
                <option value="Teknologi Komputer" {{ $user->prodi == 'Teknologi Komputer' ? 'selected' : '' }}>Teknologi Komputer</option>
                <option value="Administrasi Perkantoran" {{ $user->prodi == 'Administrasi Perkantoran' ? 'selected' : '' }}>Administrasi Perkantoran</option>
                <option value="Akutansi" {{ $user->prodi == 'Akutansi' ? 'selected' : '' }}>Akutansi</option>
                <option value="Perbankan" {{ $user->prodi == 'Perbankan' ? 'selected' : '' }}>Perbankan</option>
                <option value="Perhotelan" {{ $user->prodi == 'Perhotelan' ? 'selected' : '' }}>Perhotelan</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="no_Telepon" class="block text-sm font-medium text-gray-600">No Telepon</label>
            <input 
                type="text" 
                id="no_Telepon" 
                name="no_Telepon" 
                value="{{ old('no_Telepon', $user->no_Telepon) }}" 
                class="w-full px-3 py-2 mt-1 border rounded focus:ring-2 focus:ring-blue-500"
                required
            />
        </div>


        <div class="mb-4">
            <label for="usertype" class="block text-sm font-medium text-gray-600">User type</label>
            <select 
                id="usertype" 
                name="usertype" 
                class="w-full px-3 py-2 mt-1 border rounded focus:ring-2 focus:ring-blue-500"
                required
            >
                <option value="admin" {{ $user->usertype == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ $user->usertype == 'user' ? 'selected' : '' }}>User</option>
            </select>
        </div>

        <div class="flex justify-end">
      <x-primary-button>
        {{ __('Save') }}
      </x-primary-button>
        </div>
    </form>
</div>
</x-app-layout>