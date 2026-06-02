<script setup>
import { Head } from "@inertiajs/vue3";
import HomePage from "@/Components/Home/HomePage.vue";

// Page metadata
const pageConfig = {
    topbar: {
        links: [
            { label: "Kontak", href: "#" },
            { label: "Bantuan", href: "#" },
        ],
        socialLinks: [
            { icon: "f", href: "https://facebook.com" },
            { icon: "ig", href: "https://instagram.com" },
            { icon: "tw", href: "https://twitter.com" },
        ],
    },
    breadcrumbs: [
        { label: "Beranda", href: "/" },
        { label: "KPM", href: "/kpm" },
        { label: "Halaman Utama", current: true },
    ],
};
</script>

<template>
    <Head>
        <title>KPM UKWMS — Kantor Penjaminan Mutu</title>
        <meta
            name="description"
            content="Kantor Penjaminan Mutu UKWMS membangun budaya mutu yang berkelanjutan di lingkungan universitas."
        />
    </Head>

    <HomePage :config="pageConfig" />
</template>