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
                {{ __('Admin Dashboard') }}
            </h2>
        </div>
        
    </x-slot>

    
<div class="container relative flex flex-col justify-between h-full max-w-5xl px-6 mx-auto xl:px-0 mt-4">
    <h2 class="mb-2 text-2xl font-bold leading-tight text-gray-900">Services</h2>
    <p class="mb-8 text-sm text-gray-500">Here are a few of the awesome services we provide.</p>
    <div class="w-full">
        <div class="flex flex-col w-full mb-6 sm:flex-row">
            <div class="w-full mb-6 sm:mb-0 sm:w-1/2">
                <div class="relative h-full ml-0 mr-0 sm:mr-6">
                    <span class="absolute top-0 left-0 w-full h-full mt-0.5 ml-0.5 bg-indigo-500 rounded-lg"></span>
                    <div class="relative h-full p-4 bg-white border border-indigo-500 rounded-lg">
                        <h3 class="mb-1 text-sm font-bold text-gray-800">DAPP Development</h3>
                        <p class="mb-1 text-xs font-medium text-indigo-500 uppercase">------------</p>
                        <p class="text-xs text-gray-600">
                            A decentralized application (dapp) is an application built on a decentralized network that combines a smart contract and a frontend user interface.
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-1/2">
                <div class="relative h-full ml-0 sm:mr-6">
                    <span class="absolute top-0 left-0 w-full h-full mt-0.5 ml-0.5 bg-purple-500 rounded-lg"></span>
                    <div class="relative h-full p-4 bg-white border border-purple-500 rounded-lg">
                        <h3 class="mb-1 text-sm font-bold text-gray-800">Web 3.0 Development</h3>
                        <p class="mb-1 text-xs font-medium text-purple-500 uppercase">------------</p>
                        <p class="text-xs text-gray-600">
                            Web 3.0 is the third generation of Internet services that will focus on understanding and analyzing data to provide a semantic web.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col w-full mb-6 sm:flex-row">
            <div class="w-full mb-6 sm:mb-0 sm:w-1/2">
                <div class="relative h-full ml-0 mr-0 sm:mr-6">
                    <span class="absolute top-0 left-0 w-full h-full mt-0.5 ml-0.5 bg-blue-400 rounded-lg"></span>
                    <div class="relative h-full p-4 bg-white border border-blue-400 rounded-lg">
                        <h3 class="mb-1 text-sm font-bold text-gray-800">Project Audit</h3>
                        <p class="mb-1 text-xs font-medium text-blue-400 uppercase">------------</p>
                        <p class="text-xs text-gray-600">
                            A Project Audit is a formal review of a project, which is intended to assess the extent up to which project management standards are being upheld.
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-full mb-6 sm:mb-0 sm:w-1/2">
                <div class="relative h-full ml-0 sm:mr-6">
                    <span class="absolute top-0 left-0 w-full h-full mt-0.5 ml-0.5 bg-yellow-400 rounded-lg"></span>
                    <div class="relative h-full p-4 bg-white border border-yellow-400 rounded-lg">
                        <h3 class="mb-1 text-sm font-bold text-gray-800">Hacking / RE</h3>
                        <p class="mb-1 text-xs font-medium text-yellow-400 uppercase">------------</p>
                        <p class="text-xs text-gray-600">
                            A security hacker is someone who explores methods for breaching defenses and exploiting weaknesses in a computer system or network.
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-1/2">
                <div class="relative h-full ml-0 sm:mr-6">
                    <span class="absolute top-0 left-0 w-full h-full mt-0.5 ml-0.5 bg-green-500 rounded-lg"></span>
                    <div class="relative h-full p-4 bg-white border border-green-500 rounded-lg">
                        <h3 class="mb-1 text-sm font-bold text-gray-800">Bot/Script Development</h3>
                        <p class="mb-1 text-xs font-medium text-green-500 uppercase">------------</p>
                        <p class="text-xs text-gray-600">
                            Bot development frameworks were created as advanced software tools that eliminate a large amount of manual work and accelerate the development process.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</x-app-layout>
