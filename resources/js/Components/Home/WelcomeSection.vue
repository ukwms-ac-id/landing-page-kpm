<script setup>
const props = defineProps({
    data: {
        type: Object,
        default: () => ({
            photo: {
                icon: "👤",
                alt: "Ketua KPM",
                badge: "Ketua KPM UKWMS",
                badgeSubtext: "Periode 2024-2026",
            },
            quote: "Mutu adalah komitmen kami untuk keunggulan yang berkelanjutan dalam setiap aspek kehidupan akademik.",
            content: [
                "Kantor Penjaminan Mutu (KPM) UKWMS berdedikasi untuk memastikan standar kualitas tertinggi dalam semua kegiatan akademik dan administratif. Kami berkomitmen untuk terus meningkatkan budaya mutu di seluruh institusi.",
                "Dengan serangkaian program, workshop, dan sistem monitoring yang komprehensif, kami membantu setiap unit di UKWMS untuk mencapai dan mempertahankan standar mutu internasional.",
            ],
            signature: "Dr. Ir. H. Bambang Sujanto, M.Sc.",
            position: "Ketua Kantor Penjaminan Mutu",
        }),
    },
});
</script>

<template>
    <section class="bg-white py-24">
        <div class="mx-auto max-w-5xl px-10">
            <div class="grid grid-cols-2 gap-16 items-center">
                <!-- Left Side - Photo & Badge -->
                <div class="relative">
                    <div class="relative group">
                        <!-- Photo Container -->
                        <div
                            class="relative w-full aspect-[3/4] rounded-3xl overflow-hidden bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center text-8xl shadow-lg"
                        >
                            {{ data.photo.icon }}
                        </div>

                        <!-- Shadow Box -->
                        <div
                            class="absolute -bottom-6 -right-6 w-full h-full border-4 border-[var(--Y)] rounded-3xl pointer-events-none"
                        />

                        <!-- Badge -->
                        <div
                            class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 bg-[var(--R)] text-white px-6 py-3 rounded-xl text-center shadow-lg z-10 whitespace-nowrap"
                        >
                            <div class="text-sm font-bold">
                                {{ data.photo.badge }}
                            </div>
                            <div class="text-xs font-medium opacity-80 mt-0.5">
                                {{ data.photo.badgeSubtext }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Content -->
                <div class="pt-12">
                    <!-- Quote -->
                    <blockquote
                        class="font-serif text-xl italic text-[var(--INK)] leading-relaxed border-l-4 border-[var(--Y)] pl-7 mb-8 bg-gray-100 p-6 rounded-r-2xl"
                    >
                        "{{ data.quote }}"
                    </blockquote>

                    <!-- Body Text -->
                    <div class="space-y-4 mb-8">
                        <p
                            v-for="(para, idx) in data.content"
                            :key="idx"
                            class="text-[var(--MID)] leading-relaxed"
                        >
                            {{ para }}
                        </p>
                    </div>

                    <!-- Signature -->
                    <div>
                        <div
                            class="font-serif italic text-xl text-[var(--INK)]"
                        >
                            {{ data.signature }}
                        </div>
                        <div
                            class="text-sm font-semibold text-[var(--DIM)] mt-1"
                        >
                            {{ data.position }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
