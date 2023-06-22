<script setup lang="ts">
import axios from 'axios';
import DynamicTable from '@/Components/DynamicTable.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SearchBar from '@/Components/SearchBar.vue';
import UploadButton from '@/Components/UploadButton.vue';
import Modal from '@/Components/Modal.vue';
import Layout from '@/Layouts/Layout.vue';
import { Head, router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';

const props = defineProps<{
  pieces: Array<any>, 
  role_id: number
}>()

const head =
{
  material_id: 'Matériel',
  name: 'Nom',
  creation_year: 'Année',
  model_id: 'Modèle'
}

const modal = ref(false)

let piece: any;

const openModal = (item:any) => {
  modal.value = true;
  return piece = item;
}

const closeModal = () => {
  modal.value = false;
}

const watcher = (search) => {
  
  router.get(
    "/pieces",
    { search: search},
    { preserveState: true, replace: true}
  )
}
</script>

<template>
  <Head title="Pieces" />

  <Layout :role_id="props.role_id">

    <h1>Référentiel Pièces</h1>

    <div class="option">
      <UploadButton  v-if="props.role_id === 3 || props.role_id === 1"/>
      <SearchBar @write="watcher"/>
    </div>

    <DynamicTable :headers="head" :data="props.pieces" @select="openModal" />

    <Modal :show="modal" @close="closeModal">
      <h2 @click="closeModal">&times;</h2>
      <h1>{{ piece.name }}</h1>
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

.option {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin: 1rem 2rem;
  padding: 1rem;
  border: 1px solid var(--main-light);
  border-radius: 5px;
  box-shadow: 0px 0px 24px 2px var(--main-light);
  -webkit-box-shadow: 0px 0px 24px 2px var(--main-light);
  -moz-box-shadow: 0px 0px 24px 2px var(--main-light);
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