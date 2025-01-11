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

    <div class="container relative flex flex-col justify-between h-full max-w-5xl px-6 mx-auto xl:px-0 mt-4">
        <h2 class="mb-2 text-2xl font-bold leading-tight text-gray-900 pb-3">Settings Users</h2>    
        <div class="w-full bg-white p-10 rounded-xl shadow-xl">
            <div class="flex flex-col w-full mb-6 sm:flex-row">
                <div class="container mx-auto p-4">
                    <div class="overflow-x-auto">
                      <table class="min-w-full bg-white border border-gray-200 rounded-xl shadow-md ">
                        <thead>
                          <tr class="bg-gray-100 border-b">
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">id</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Nama</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">NIM</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Prodi</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">No Telepon</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Email</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">User Type</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Actions</th>
                          </tr>
                        </thead>
                        @foreach ($users as $user)
                        <tbody>
                          <tr class="border-b hover:bg-gray-50 text-xs">
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $user->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $user->nim }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $user->prodi }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $user->no_Telepon }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $user->usertype }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                              <a href="{{ Route('edit.kelolauser', $user->id)}}" class="px-3 py-1 text-sm text-white bg-blue-500 rounded hover:bg-blue-600">Edit</a>
                              <form action="{{ Route('destroy.kelolauser', $user->id) }}" method="POST" onsubmit="return confirm('apakah anda yakin ingin menghapus user ini?');">
                                @csrf
                                @method('DELETE')
                              <button type="submit" class="px-3 py-1 text-sm text-white bg-red-500 rounded hover:bg-red-600">Delete</button>
                              </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    
</x-app-layout>