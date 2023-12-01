<script setup lang="ts">
import Layout from '@/Layouts/Layout.vue';
import DynamicTable from '@/Components/DynamicTable.vue';
import OptionBar from '@/Components/OptionBar.vue';
import SearchBar from '@/Components/SearchBar.vue';
import UploadButton from '@/Components/UploadButton.vue';
import TitlePage from '@/Components/TitlePage.vue';
import { Head, router, usePage, useForm } from '@inertiajs/vue3';

const page = usePage()

const props = defineProps<{
  materials: Array<any>,
  existingMaterials?: number
}>()

const head = {
  id: 'ID',
  name: 'Modèle',
  status: 'Status',
  constructor_id: 'Constructeur',
  type_id: 'Type',
  creation_year: 'Année',
  has_electro: 'Electro',
}

const watcher = (search) => {
  router.get(
    "/models/materials",
    { search: search },
    { preserveState: true, replace: true }
  )
}

const form = useForm({
  file: ''
})

const sendFile = e => {
  form.file = e.target.files[0]
  form.post(route('models.materials.store'))
}

</script>

<template>
  <Head title="Matériel" />
  <Layout>
    <TitlePage>
      Référentiel Matériel
    </TitlePage>

    <OptionBar>
      <UploadButton v-if="page.props.auth?.user.canImportData" @change="sendFile" />
      <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
        role="alert" v-if="$page.props.flash.success">
        <p>{{ $page.props.flash.success }}</p>
      </div>
      <SearchBar @write="watcher" />
    </OptionBar>

    <DynamicTable :headers="head" :data="materials" />
  </Layout>
</template>

<style scoped></style>