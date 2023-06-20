<script setup lang="ts">
import TestComponent from '@/Components/TestComponent.vue';
import Layout from '@/Layouts/Layout.vue';
import { Head } from '@inertiajs/vue3';

const head = {
  name: ''
} 

</script>

<template>
  <Head title="Campagne" />
    <Layout>
      <h1>Liste des campagnes</h1>
      <TestComponent />
    </Layout>
</template>

<style scoped>

</style>