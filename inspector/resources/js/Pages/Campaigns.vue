<script setup lang="ts">
import Layout from '@/Layouts/Layout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps<{
  campaigns: Array<any>,
}>()

const head = {
  name: ''
} 

</script>

<template>
  <Head title="Campagne" />
    <Layout>
      <h1>Liste des campagnes</h1>
    </Layout>
</template>

<style scoped>

</style>