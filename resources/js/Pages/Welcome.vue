<script setup>
import { Head } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
// import AnnouncementTicker from "@/Components/Home/AnnouncementTicker.vue";
import HeroSlider from "@/Components/Home/HeroSlider.vue";

// Nanti komponen lain seperti Sambutan, Layanan, dll akan di-import di sini
</script>

<template>
    <Head title="Beranda" />

    <MainLayout>
        <AnnouncementTicker />

        <HeroSlider />
    </MainLayout>
</template>
