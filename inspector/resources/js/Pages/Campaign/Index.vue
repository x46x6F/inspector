<script setup lang="ts">
import TitlePage from '@/Components/TitlePage.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import OptionBar from '@/Components/OptionBar.vue';
import DynamicTable from '@/Components/DynamicTable.vue';
import SearchBar from '@/Components/SearchBar.vue';
import Layout from '@/Layouts/Layout.vue';
import { Head, router } from '@inertiajs/vue3';

const props = defineProps<{
  campaigns: Array<any>,
}>()

const head = {
  name: 'Nom',
  start_date: 'Date début',
  end_date: 'Date fin',
  creator_id: 'Créer par',
  auditor_id: 'Auditeur',
  site_id: 'Site',
  status: 'Status',
} 

const watcher = (search) => {

router.get(
  "/campaigns",
  { search: search },
  { preserveState: true, replace: true }
)
}

</script>

<template>
  <Head title="Campagne" />
    <Layout>
      <TitlePage>
        Liste des campagnes
      </TitlePage>
      <OptionBar>
        <PrimaryButton @click="router.visit(route('campaigns.create'))">
          Créer
        </PrimaryButton>
        <SearchBar @write="watcher"/>
      </OptionBar>
      <DynamicTable :headers="head" />
    </Layout>
</template>

<style scoped>

</style>