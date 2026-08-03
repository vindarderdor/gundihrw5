<!-- Sidebar Navigation -->
<nav :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-slate-900 lg:translate-x-0 lg:static lg:inset-0 shadow-lg border-r border-slate-800">
    <div class="flex items-center justify-center h-20 bg-slate-900 border-b border-slate-800">
        <div class="flex items-center">
            <x-application-logo class="w-8 h-8 text-indigo-500 fill-current" />
            <span class="mx-2 text-lg font-semibold text-white tracking-widest uppercase">Admin Panel</span>
        </div>
    </div>

    <nav class="mt-6 px-4 space-y-2">
        <x-sidebar-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
            <svg class="w-5 h-5 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            <span class="mx-3 font-medium">Dashboard</span>
        </x-sidebar-link>

        <x-sidebar-link :href="route('admin.umkms.index')" :active="request()->routeIs('admin.umkms.*')">
            <svg class="w-5 h-5 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            <span class="mx-3 font-medium">Kelola UMKM</span>
        </x-sidebar-link>

        <x-sidebar-link :href="route('admin.categories.index')" :active="request()->routeIs('admin.categories.*')">
            <svg class="w-5 h-5 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
            <span class="mx-3 font-medium">Kelola Kategori</span>
        </x-sidebar-link>

        <x-sidebar-link :href="route('admin.news.index')" :active="request()->routeIs('admin.news.*')">
            <svg class="w-5 h-5 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5L18.5 7H20M9 11l3-3m0 0l3 3m-3-3v8"></path></svg>
            <span class="mx-3 font-medium">Kelola Berita</span>
        </x-sidebar-link>

        <x-sidebar-link :href="route('admin.messages.index')" :active="request()->routeIs('admin.messages.*')">
            <svg class="w-5 h-5 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            <span class="mx-3 font-medium">Pesan Masuk</span>
        </x-sidebar-link>

        <x-sidebar-link :href="route('admin.profile-kelurahan.edit')" :active="request()->routeIs('admin.profile-kelurahan.*')">
            <svg class="w-5 h-5 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            <span class="mx-3 font-medium">Profil Kelurahan</span>
        </x-sidebar-link>
    </nav>
</nav>

<!-- Sidebar Overlay for mobile -->
<div @click="sidebarOpen = false" :class="sidebarOpen ? 'block' : 'hidden'" class="fixed inset-0 z-20 transition-opacity bg-slate-900 opacity-50 lg:hidden"></div>
