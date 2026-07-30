<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-900 bg-gray-50">
        <div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden">
            
            <!-- Sidebar Navigation -->
            @include('layouts.navigation')

            <!-- Main Content Area -->
            <div class="flex-1 flex flex-col overflow-hidden">
                
                <!-- Top Header for Mobile & Profile -->
                <header class="flex items-center justify-between px-6 py-4 bg-white border-b border-gray-200">
                    <div class="flex items-center">
                        <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="flex items-center">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 focus:outline-none transition duration-150 ease-in-out">
                                    <div class="mr-2 rounded-full bg-gray-200 p-1">
                                        <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <div class="font-semibold">{{ Auth::user()->name }}</div>
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </header>

                <!-- Page Heading -->
                @isset($header)
                    <div class="bg-white border-b border-gray-200">
                        <div class="px-6 py-4">
                            {{ $header }}
                        </div>
                    </div>
                @endisset

                <!-- Main Content -->
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
