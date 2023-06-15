<script setup lang="ts">
import Layout from '@/Layouts/Layout.vue';
import { Head } from '@inertiajs/vue3';
const props = defineProps(['pieces'])
</script>

<template>
  <Head title="Pieces" />
  <Layout>
    <h1>Référentiel Pièces</h1>
    <div id="table">
    <table>
      <thead>
        <tr>
          <th>Matériel</th>
          <th>Nom</th>
          <th>Année</th>
        </tr>
      </thead>
        <tbody>
          <tr v-for="piece in props.pieces">
            <td>{{ piece.material_id }}</td>
            <td>{{ piece.name }}</td>
            <td>{{ piece.creation_year }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </Layout>
</template>

<style scoped>
h1 {
  padding: 4rem;
  text-align: center;
  font-size: 2.5rem;
  font-weight: 900;
}
#table {
  width: 100%;
  height: 40vh;
  overflow: scroll;
  overflow-x: hidden;
}

table {
  width: 70vw;
}

tbody {
  border-collapse: collapse;
  width: 80vw;
}

tbody tr:nth-child(even) {
  background-color: var(--main-light) !important;
}

th {
  background-color: white;
  position: sticky;
  top: 0;
}

th,
td {
  padding: 5px;
}
</style>