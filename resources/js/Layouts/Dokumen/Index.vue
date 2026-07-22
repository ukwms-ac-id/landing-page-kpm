<script setup>
import { Head, Link } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

defineProps({
  documents: { type: Array, required: true },
});
</script>

<template>
  <Head title="Daftar Dokumen" />

  <MainLayout>
    <section class="c" style="padding: 40px 0;">
      <h1>Daftar Dokumen</h1>

      <ul style="list-style: none; padding: 0; margin-top: 20px;">
        <li v-for="doc in documents" :key="doc.slug" style="margin-bottom: 12px;">
          <Link :href="`/dokumen/${doc.slug}`" style="font-weight: 600;">
            {{ doc.title }}
          </Link>
          <span v-if="doc.category" style="color: #888; font-size: 13px; margin-left: 8px;">
            ({{ doc.category }})
          </span>
        </li>
      </ul>

      <p v-if="documents.length === 0" style="color: #888;">
        Belum ada dokumen terdaftar.
      </p>
    </section>
  </MainLayout>
</template>