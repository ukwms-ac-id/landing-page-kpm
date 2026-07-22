<script setup>
import { Head, router } from '@inertiajs/vue3';

defineProps({
    auth: Object,
});

const logout = () => {
    router.post('/logout');
};
</script>

<template>
    <Head title="Dashboard - KPM UKWMS" />

    <div class="min-h-screen bg-gray-100 flex">
        <aside class="w-64 bg-slate-900 text-slate-300 hidden md:flex flex-col justify-between shadow-xl">
            <div>
                <div class="h-16 flex items-center px-6 bg-slate-950 text-white font-bold text-lg border-b border-slate-800">
                    🛡️ CMS KPM Admin
                </div>
                <nav class="p-4 space-y-2">
                    <a href="/dashboard" class="flex items-center gap-3 px-4 py-2.5 rounded-lg bg-indigo-600 text-white font-medium text-sm">
                        📊 Dashboard
                    </a>
                    <a href="/admin/dokumen/create" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-slate-800 hover:text-white font-medium text-sm transition">
                        📄 Upload Dokumen
                    </a>
                </nav>
            </div>
            <div class="p-4 border-t border-slate-800">
                <button 
                    @click="logout" 
                    class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-lg bg-red-600/10 text-red-400 hover:bg-red-600 hover:text-white font-medium text-sm transition"
                >
                    🚪 Keluar (Logout)
                </button>
            </div>
        </aside>

        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <header class="h-16 bg-white shadow-sm flex items-center justify-between px-6 border-b border-gray-200">
                <span class="text-sm font-semibold text-gray-700">Panel Kontrol Utama</span>
                <span class="text-sm text-gray-600">Halo, <strong>{{ auth.user.name }}</strong></span>
            </header>

            <main class="flex-1 overflow-y-auto p-8">
                <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">Selamat Datang di Dashboard Admin!</h1>
                    <p class="text-gray-600 mb-6">Sistem manajemen konten KPM UKWMS.</p>
                    <!-- <a 
                        href="/admin/dokumen/create" 
                        class="inline-block px-5 py-2.5 bg-indigo-600 text-white font-semibold rounded-lg shadow hover:bg-indigo-700 transition"
                    >
                        + Upload Dokumen Sekarang
                    </a> -->
                </div>
            </main>
        </div>
    </div>
</template>