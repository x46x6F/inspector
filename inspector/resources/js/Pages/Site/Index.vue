<script setup lang="ts">
import PrimaryButton from '@/Components/PrimaryButton.vue';
import OptionBar from '@/Components/OptionBar.vue';
import Layout from '@/Layouts/Layout.vue';
import DynamicTable from '@/Components/DynamicTable.vue';
import TitlePage from '@/Components/TitlePage.vue';

import { Head, router, usePage, useForm } from '@inertiajs/vue3';



const props = defineProps<{
  sites: Array<any>
}>()

const head = {
  name: 'Nom',
  adress: 'Adresse',
  zip_code: 'Code Postal',
  city: 'Ville',
}
</script>

<template>
  <Head title="Sites"/>
  <Layout>
      <TitlePage>
        Liste des sites
      </TitlePage>
      <OptionBar>
        <PrimaryButton @click="router.visit(route('sites.create'))">
          Ajouter
        </PrimaryButton>
      </OptionBar>
      <DynamicTable :headers="head" :data="props.sites" />
    </Layout>
</template>

<style scoped>

</style>