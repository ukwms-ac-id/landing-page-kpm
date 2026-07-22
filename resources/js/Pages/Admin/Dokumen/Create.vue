<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { router } from "@inertiajs/vue3";

// 1. Menerima props daftar dokumen yang dikirim dari Controller
defineProps({
    documents: Array,
});

// Menggunakan state management form dari Inertia
const form = useForm({
    title: "",
    category: "",
    file: null,
    is_active: true,
});

const submit = () => {
    // Menggunakan URL path langsung '/admin/dokumen' untuk menghindari error route()
    form.post("/admin/dokumen", {
        forceFormData: true,
        onSuccess: () => form.reset('title', 'category', 'file'),
    });
};

const logout = () => {
    router.post("/logout");
};

// Fungsi format tanggal agar timestamp-nya mudah dibaca (Bahasa Indonesia)
const formatDate = (dateString) => {
    const options = { year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit' };
    return new Date(dateString).toLocaleDateString('id-ID', options);
};
</script>

<template>
    <Head title="Upload Dokumen - Admin KPM" />

    <div class="min-h-screen bg-gray-100 flex">
        <aside class="w-64 bg-slate-900 text-slate-300 hidden md:flex flex-col justify-between shadow-xl">
            <div>
                <div class="h-16 flex items-center px-6 bg-slate-950 text-white font-bold text-lg border-b border-slate-800">
                    🛡️ CMS KPM Admin
                </div>
                <nav class="p-4 space-y-2">
                    <a href="/dashboard" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-slate-800 hover:text-white font-medium text-sm transition">
                        📊 Dashboard
                    </a>
                    <a href="/admin/dokumen/create" class="flex items-center gap-3 px-4 py-2.5 rounded-lg bg-indigo-600 text-white font-medium text-sm">
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
                <span class="text-sm font-semibold text-gray-700">Form Manajemen Dokumen</span>
                <span class="text-sm text-gray-600">
                    Halo, <strong>{{ $page.props.auth.user.name }}</strong>
                </span>
            </header>

            <main class="flex-1 overflow-y-auto p-6 lg:p-10 space-y-8">
                
                <div class="max-w-3xl mx-auto w-full bg-white rounded-xl shadow-sm border border-gray-200 p-8">
                    
                    <div class="mb-6 border-b pb-4 flex justify-between items-center">
                        <div>
                            <h1 class="text-xl font-bold text-gray-900">Upload Dokumen Baru</h1>
                            <p class="text-sm text-gray-500 mt-1">Unggah file PDF ke penyimpanan privat yang aman.</p>
                        </div>
                        <a href="/dashboard" class="text-sm text-indigo-600 hover:underline font-medium">
                            ← Kembali
                        </a>
                    </div>

                    <div v-if="$page.props.flash?.success" class="mb-5 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm font-medium">
                        {{ $page.props.flash.success }}
                    </div>

                    <form @submit.prevent="submit" class="space-y-5">
                        
                        <div>
                            <InputLabel for="title" value="Judul Dokumen" />
                            <TextInput
                                id="title"
                                type="text"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                v-model="form.title"
                                required
                                placeholder="Contoh: Standar Pendidikan UKWMS 2024-2029"
                            />
                            <InputError class="mt-2" :message="form.errors.title" />
                        </div>

                        <div>
                            <InputLabel for="category" value="Kategori (Opsional)" />
                            <TextInput
                                id="category"
                                type="text"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                v-model="form.category"
                                placeholder="Contoh: SPMI / Kebijakan / Renstra"
                            />
                            <InputError class="mt-2" :message="form.errors.category" />
                        </div>

                        <div>
                            <InputLabel for="file" value="File Dokumen (.PDF)" />
                            <input
                                id="file"
                                type="file"
                                accept="application/pdf"
                                class="mt-1 block w-full text-sm text-gray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-lg file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-indigo-50 file:text-indigo-700
                                    hover:file:bg-indigo-100 cursor-pointer"
                                @input="form.file = $event.target.files[0]"
                                required
                            />
                            <InputError class="mt-2" :message="form.errors.file" />
                        </div>

                        <div class="flex items-center gap-2 pt-1">
                            <input
                                type="checkbox"
                                id="is_active"
                                v-model="form.is_active"
                                class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 h-4 w-4"
                            />
                            <label for="is_active" class="text-sm font-medium text-gray-700">Aktifkan dokumen (Tampilkan ke publik)</label>
                        </div>

                        <div v-if="form.progress" class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-indigo-600 h-2.5 rounded-full transition-all duration-300" :style="{ width: form.progress.percentage + '%' }"></div>
                        </div>

                        <div class="pt-2">
                            <PrimaryButton
                                class="w-full justify-center py-2.5 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 transition rounded-lg text-white font-semibold text-sm shadow-md"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                <span v-if="form.processing">Mengunggah...</span>
                                <span v-else>Simpan & Amankan Dokumen</span>
                            </PrimaryButton>
                        </div>

                    </form>
                </div>

                <div class="max-w-4xl mx-auto w-full bg-white rounded-xl shadow-sm border border-gray-200 p-8">
                    <div class="mb-6">
                        <h2 class="text-lg font-bold text-gray-900">Riwayat Dokumen Terunggah</h2>
                        <p class="text-sm text-gray-500">Daftar file PDF yang tersimpan di sistem beserta waktu unggahnya.</p>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-left text-sm">
                            <thead class="bg-gray-50 text-gray-600 font-semibold uppercase text-xs">
                                <tr>
                                    <th class="px-6 py-3">No</th>
                                    <th class="px-6 py-3">Judul Dokumen</th>
                                    <th class="px-6 py-3">Kategori</th>
                                    <th class="px-6 py-3">Status</th>
                                    <th class="px-6 py-3">Timestamp (Waktu Upload)</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 text-gray-700">
                                <tr v-if="!documents || documents.length === 0">
                                    <td colspan="5" class="px-6 py-6 text-center text-gray-400">
                                        Belum ada dokumen yang diunggah.
                                    </td>
                                </tr>
                                <tr v-for="(doc, index) in documents" :key="doc.id" class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 font-medium text-gray-500">{{ index + 1 }}</td>
                                    <td class="px-6 py-4 font-semibold text-gray-900">{{ doc.title }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-2.5 py-1 bg-gray-100 text-gray-800 rounded-md text-xs font-medium">
                                            {{ doc.category || 'Umum' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span :class="doc.is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'" class="px-2.5 py-1 rounded-full text-xs font-bold">
                                            {{ doc.is_active ? 'Aktif' : 'Disembunyikan' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-500 text-xs">
                                        {{ formatDate(doc.created_at) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>
        </div>
    </div>
</template>