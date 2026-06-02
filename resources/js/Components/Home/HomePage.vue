<script setup>
import TopBar from "./TopBar.vue";
import Navigation from "./Navigation.vue";
import AnnouncementTicker from "./AnnouncementTicker.vue";
import HeroSliderFull from "./HeroSliderFull.vue";
import BreadCrumb from "./BreadCrumb.vue";
import WelcomeSection from "./WelcomeSection.vue";

defineProps({
    config: {
        type: Object,
        default: () => ({
            topbar: {
                links: [
                    { label: "Kontak", href: "#" },
                    { label: "Bantuan", href: "#" },
                ],
                socialLinks: [
                    { icon: "f", href: "#facebook" },
                    { icon: "ig", href: "#instagram" },
                    { icon: "tw", href: "#twitter" },
                ],
            },
            breadcrumbs: [
                { label: "Beranda", href: "/" },
                { label: "KPM", href: "/kpm" },
                { label: "Selamat Datang", current: true },
            ],
        }),
    },
});
</script>

<template>
    <div class="min-h-screen bg-gray-100">
        <!-- Top Bar -->
        <TopBar
            :links="config.topbar.links"
            :social-links="config.topbar.socialLinks"
        />

        <!-- Navigation -->
        <Navigation />

        <!-- Ticker -->
        <AnnouncementTicker />

        <!-- Hero Slider -->
        <HeroSliderFull />

        <!-- Breadcrumb -->
        <BreadCrumb :items="config.breadcrumbs" />

        <!-- Welcome Section -->
        <WelcomeSection />
    </div>
</template>
