<script setup lang="ts">
const props = defineProps<{
  headers: Object,
  data: Array<any>
}>()
</script>

<template>
  <div id="table">
    <table>
      <thead>
        <tr>
          <th v-for="header in headers" :key="header">{{ header }}</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in data" :key="item">
          <!-- <td v-for="value,key in headers" :key="key"> {{ key }}: {{ value }} {{ item }}</td> -->
          <td v-for="_, key in headers" :key="key"> {{ item[key] }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<style scoped>
#table {
  /* border: 1px solid red; */
  width: 80vw;
  height: 40vh;
  display: flex;
  justify-content: center;
  overflow: scroll;
  overflow-x: hidden;
}
/* #table {
  margin: 2rem;
  width: 100%;
  height: 40vh;
} */

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