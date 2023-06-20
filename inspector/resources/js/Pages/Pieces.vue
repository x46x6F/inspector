<script setup lang="ts">
import axios from 'axios'
import DynamicTable from '@/Components/DynamicTable.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Layout from '@/Layouts/Layout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';

const pieces = ref([])

const getPieces = () => {
  axios.get('/api/pieces')
    .then(res => pieces.value = res.data)
    .catch(error => console.log(error))
}

onMounted(() => getPieces())

const head =
{
  material_id: 'Matériel',
  name: 'Nom',
  creation_year: 'Année',
  model_id: 'Modèle'
}
</script>

<template>
  <Head title="Pieces" />

  <Layout>

    <h1>Référentiel Pièces</h1>

    <div class="option">
      <PrimaryButton>
        Upload
      </PrimaryButton>
    </div>

    <DynamicTable :headers="head" :data="pieces" />

  </Layout>
</template>

<style scoped>
h1 {
  padding: 4rem;
  text-align: center;
  font-size: 2.5rem;
  font-weight: 900;
}

.option {
  /* overflow: hidden; */
  display: flex;
  margin: 2rem 2rem;
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