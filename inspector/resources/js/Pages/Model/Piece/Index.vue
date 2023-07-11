<script setup lang="ts">
import DynamicTable from '@/Components/DynamicTable.vue';
import OptionBar from '@/Components/OptionBar.vue';
import SearchBar from '@/Components/SearchBar.vue';
import UploadButton from '@/Components/UploadButton.vue';
import Modal from '@/Components/Modal.vue';
import Layout from '@/Layouts/Layout.vue';
import { Head, router, usePage, useForm } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import { computed } from 'vue';

const page = usePage()

const props = defineProps<{
  pieces: Array<any>,
  existingPieces?: number
}>()

const head =
{
  name: 'Modèle',
  creation_year: 'Année',
  compose_id: 'Matériel',
}

const modal = ref(false)
const errors = computed(() => props.existingPieces > 0)
const showModal = ref(true);

let piece: any;

const openModal = (item: any) => {
  modal.value = true;
  return piece = item;
}

const closeModal = () => {
  modal.value = false;
}

const watcher = (search) => {

  router.get(
    "/models/pieces",
    { search: search },
    { preserveState: true, replace: true }
  )
}

const form = useForm({
  file: ''
})

const sendFile = e => {
  form.file = e.target.files[0]
  form.post(route('models.pieces.store'))
}

const closeError = () => {
  showModal.value = false
}
</script>

<template>
  <Head title="Pieces" />

  <Layout>

    <h1>Référentiel Pièces</h1>

    <OptionBar>
      <UploadButton v-if="page.props.auth?.user.canImportData" @change="sendFile" />
      <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert" v-if="$page.props.flash.success">
        <p>{{ $page.props.flash.success }}</p>
      </div>
      <SearchBar @write="watcher" />
    </OptionBar>

    <DynamicTable :headers="head" :data="props.pieces" @select="openModal" />

    <Modal :show="modal" @close="closeModal">
      <h2 @click="closeModal">&times;</h2>
      <h1>{{ piece.name }}</h1>
    </Modal>
    <Modal :show="errors && showModal" @close="closeError">
      <p>Il y a {{ existingPieces }} pièces déjà existantes dans la base. Voulez vous tout mettre à jour ?</p>
      <button @click="closeError">Non</button>
      <button @click="router.post(route('models.pieces.forceUpdate'))">Oui</button>
    </Modal>
  </Layout>
</template>

<style scoped>
h1 {
  padding: 2.8rem 4rem;
  text-align: center;
  font-size: 2.5rem;
  font-weight: 900;
}


button {
  width: fit-content;
  height: 2rem;
  background-color: white;
  border: 2px solid var(--main-primary);
  color: var(--main-primary);
}

button:hover {
  background-color: var(--main-lighten);
  color: white;
  border: 2px solid white;
  outline: solid var(--main-secondary);
}
</style>