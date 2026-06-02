<!-- 
  COMPONENT USAGE EXAMPLES
  Contoh berbagai cara menggunakan components yang telah dibuat
  
  File ini dapat digunakan sebagai referensi atau demo page.
  Copy-paste sesuai kebutuhan Anda.
-->

<script setup>
import { ref } from "vue";

// UI Components
import Button from "@/Components/UI/Button.vue";
import SlideBadge from "@/Components/UI/SlideBadge.vue";
import StatCell from "@/Components/UI/StatCell.vue";
import StatPanel from "@/Components/UI/StatPanel.vue";

// Section Components
import TopBar from "@/Components/Home/TopBar.vue";
import Navigation from "@/Components/Home/Navigation.vue";
import AnnouncementTicker from "@/Components/Home/AnnouncementTicker.vue";
import HeroSliderFull from "@/Components/Home/HeroSliderFull.vue";
import BreadCrumb from "@/Components/Home/BreadCrumb.vue";
import WelcomeSection from "@/Components/Home/WelcomeSection.vue";
import HomePage from "@/Components/Home/HomePage.vue";

// Example state
const clickCount = ref(0);

// Example data
const exampleStats = [
    { icon: "🎓", value: "A", suffix: "+", label: "Akreditasi" },
    { icon: "🏛️", value: "40", suffix: "+", label: "Program Studi" },
    { icon: "📋", value: "6", label: "Siklus AMI" },
    { icon: "📄", value: "200", suffix: "+", label: "Dokumen" },
];

const welcomeData = {
    photo: {
        icon: "👤",
        badge: "Ketua KPM",
        badgeSubtext: "2024-2026",
    },
    quote: "Mutu adalah komitmen kami untuk keunggulan berkelanjutan",
    content: [
        "Kantor Penjaminan Mutu UKWMS berdedikasi untuk memastikan standar kualitas tertinggi...",
    ],
    signature: "Dr. Bambang Sujanto",
    position: "Ketua Kantor Penjaminan Mutu",
};

const topbarLinks = [
    { label: "Kontak", href: "#" },
    { label: "Bantuan", href: "#" },
];

const breadcrumbItems = [
    { label: "Beranda", href: "/" },
    { label: "KPM", href: "/kpm" },
    { label: "Contoh", current: true },
];
</script>

<template>
    <div class="space-y-12 py-12">
        <!-- 
      SECTION 1: SIMPLE BUTTON EXAMPLES
    -->
        <section class="container space-y-4">
            <h2 class="text-3xl font-serif font-normal">Button Examples</h2>
            <div class="flex flex-wrap gap-3">
                <Button variant="primary" size="sm" @click="clickCount++">
                    Primary Small ({{ clickCount }})
                </Button>
                <Button variant="primary" size="md">Primary Medium</Button>
                <Button variant="primary" size="lg">Primary Large</Button>
                <Button variant="secondary" size="md">Secondary</Button>
                <Button variant="outline" size="md">Outline</Button>
                <Button variant="primary" size="md" disabled>Disabled</Button>
                <Button variant="primary" size="md" :loading="true"
                    >Loading</Button
                >
            </div>
        </section>

        <!-- 
      SECTION 2: BADGE EXAMPLES
    -->
        <section class="container space-y-4">
            <h2 class="text-3xl font-serif font-normal">Badge Examples</h2>
            <div class="flex flex-wrap gap-3">
                <SlideBadge
                    label="Light Theme"
                    theme="light"
                    :blinking="true"
                />
                <SlideBadge label="Dark Theme" theme="dark" :blinking="true" />
                <SlideBadge
                    label="Accent Theme"
                    theme="accent"
                    :blinking="true"
                />
                <SlideBadge label="With Icon" icon="🔴" theme="light" />
            </div>
        </section>

        <!-- 
      SECTION 3: STAT CELL EXAMPLES
    -->
        <section class="container space-y-4">
            <h2 class="text-3xl font-serif font-normal">Stat Cell Examples</h2>
            <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
                <StatCell
                    icon="🎓"
                    value="A"
                    suffix="+"
                    label="Akreditasi Institusi"
                    theme="light"
                />
                <StatCell
                    icon="🏛️"
                    value="40"
                    suffix="+"
                    label="Prodi Terakreditasi"
                    theme="light"
                />
                <StatCell
                    icon="📋"
                    value="6"
                    label="Siklus AMI"
                    theme="light"
                />
                <StatCell
                    icon="📄"
                    value="200"
                    suffix="+"
                    label="Dokumen SPMI"
                    theme="light"
                />
            </div>
        </section>

        <!-- 
      SECTION 4: STAT PANEL (GRID OF STATS)
    -->
        <section class="container space-y-4">
            <h2 class="text-3xl font-serif font-normal">Stat Panel Examples</h2>
            <div class="grid gap-8 md:grid-cols-2">
                <div>
                    <h3 class="mb-3 font-semibold">Light Theme</h3>
                    <StatPanel :items="exampleStats" theme="light" />
                </div>
                <div>
                    <h3 class="mb-3 font-semibold">Accent Theme</h3>
                    <StatPanel :items="exampleStats" theme="accent" />
                </div>
            </div>
        </section>

        <!-- 
      SECTION 5: TOPBAR
    -->
        <section class="space-y-4">
            <div class="container">
                <h2 class="text-3xl font-serif font-normal">TopBar Example</h2>
            </div>
            <TopBar :links="topbarLinks" />
        </section>

        <!-- 
      SECTION 6: NAVIGATION
    -->
        <section class="space-y-4">
            <div class="container">
                <h2 class="text-3xl font-serif font-normal">
                    Navigation Example
                </h2>
            </div>
            <Navigation />
        </section>

        <!-- 
      SECTION 7: ANNOUNCEMENT TICKER
    -->
        <section class="space-y-4">
            <div class="container">
                <h2 class="text-3xl font-serif font-normal">
                    Announcement Ticker Example
                </h2>
            </div>
            <AnnouncementTicker
                :items="[
                    '🔔 Pendaftaran AMI dibuka mulai 1 Januari 2025',
                    '🏅 UKWMS raih Akreditasi Unggul BAN-PT',
                    '📋 Workshop penulisan dokumen SPMI - 12 Juni 2025',
                    '🌐 3 Prodi raih akreditasi internasional FIBAA',
                ]"
                :speed="30"
            />
        </section>

        <!-- 
      SECTION 8: BREADCRUMB
    -->
        <section class="space-y-4">
            <div class="container">
                <h2 class="text-3xl font-serif font-normal">
                    Breadcrumb Example
                </h2>
            </div>
            <BreadCrumb :items="breadcrumbItems" />
        </section>

        <!-- 
      SECTION 9: HERO SLIDER (FULL)
    -->
        <section class="space-y-4">
            <div class="container">
                <h2 class="text-3xl font-serif font-normal">
                    Hero Slider Example
                </h2>
            </div>
            <HeroSliderFull />
        </section>

        <!-- 
      SECTION 10: WELCOME SECTION
    -->
        <section class="space-y-4">
            <div class="container">
                <h2 class="text-3xl font-serif font-normal">
                    Welcome Section Example
                </h2>
            </div>
            <WelcomeSection :data="welcomeData" />
        </section>

        <!-- 
      SECTION 11: FULL PAGE LAYOUT
    -->
        <section class="space-y-4">
            <div class="container">
                <h2 class="text-3xl font-serif font-normal">
                    Full Page Layout (HomePage)
                </h2>
                <p class="text-gray-600 mt-2">
                    Ini menggabungkan semua components di atas dalam satu
                    layout. Uncomment di bawah untuk melihat.
                </p>
            </div>
            <!-- 
        Uncomment untuk melihat full page layout:
        <HomePage :config="{ 
          topbar: { links: topbarLinks },
          breadcrumbs: breadcrumbItems 
        }" />
      -->
        </section>

        <!-- 
      SECTION 12: CUSTOMIZATION GUIDE
    -->
        <section class="container space-y-4 py-12 border-t">
            <h2 class="text-3xl font-serif font-normal">Customization Guide</h2>

            <div class="space-y-6">
                <div>
                    <h3 class="text-lg font-semibold mb-2">
                        1. Mengubah Warna
                    </h3>
                    <code
                        class="block bg-gray-100 p-3 rounded text-sm overflow-auto"
                    >
                        :root {
                        <br />
                        &nbsp;&nbsp;--Y: #fddb00; /* primary yellow */
                        <br />
                        &nbsp;&nbsp;--R: #ea1f27; /* secondary red */
                        <br />
                        &nbsp;&nbsp;--B: #0780c2; /* tertiary blue */
                        <br />
                        }
                    </code>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-2">
                        2. Custom Button Variant
                    </h3>
                    <code
                        class="block bg-gray-100 p-3 rounded text-sm overflow-auto"
                    >
                        &lt;Button variant="primary" size="lg"
                        @click="handleClick"&gt;
                        <br />
                        &nbsp;&nbsp;Click Me
                        <br />
                        &lt;/Button&gt;
                    </code>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-2">3. Custom Stats</h3>
                    <code
                        class="block bg-gray-100 p-3 rounded text-sm overflow-auto"
                    >
                        &lt;StatPanel :items="customStats" theme="light" /&gt;
                    </code>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-2">
                        4. Composable Usage
                    </h3>
                    <code
                        class="block bg-gray-100 p-3 rounded text-sm overflow-auto"
                    >
                        import { useSlider } from '@/composables/useSlider';
                        <br />
                        <br />
                        const slider = useSlider(3, 6000); // 3 slides, 6s delay
                        <br />
                        const { currentSlide, nextSlide, prevSlide } = slider;
                    </code>
                </div>
            </div>
        </section>
    </div>
</template>

<style scoped>
section {
    padding: 2rem 0;
}
</style>
