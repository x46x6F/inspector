<script setup lang="ts">
import Layout from '@/Layouts/Layout.vue';
import TitlePage from '@/Components/TitlePage.vue';

import { Head, router, usePage, useForm } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Sites"/>
  <Layout>
      <TitlePage>
        Liste des sites
      </TitlePage>
      <DynamicTable :headers="head" />
    </Layout>
</template>

<style scoped>

</style>