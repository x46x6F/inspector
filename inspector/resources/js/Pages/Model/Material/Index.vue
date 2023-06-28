<script setup lang="ts">
import Layout from '@/Layouts/Layout.vue';
import DynamicTable from '@/Components/DynamicTable.vue';
import TitlePage from '@/Components/TitlePage.vue';
import { Head, router, usePage } from '@inertiajs/vue3';

const page = usePage()

const props = defineProps<{
  csv_materials: Array<any>,
}>()

const head = {
  constructor_id: 'Constructeur',
  model_id: 'Modèle',
  type_id: 'Type',
  site_id: 'Site',
  creation_year: 'Année',
  has_electro: 'Electro',
  status: 'Status',
}

</script>

<template>
  <Head title="Matériel" />
    <Layout>
      <TitlePage>
        Référentiel Matériel
      </TitlePage>
      <DynamicTable :headers="head" />
    </Layout>
</template>

<style scoped>

</style>