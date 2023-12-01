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
          <td v-for="_, key in headers" :key="key" @click="$emit('select', item)"> {{
            item[key] }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<style scoped>
#table {
  width: 80vw;
  max-height: 59vh;
  display: flex;
  justify-content: center;
  overflow-y: scroll;
  overflow-x: hidden;
}

table {
  width: 75vw;
}

tbody {
  border-collapse: collapse;
  width: 80vw;
}

tbody tr:nth-child(even) {
  background-color: var(--main-light);
}

th {
  background-color: white;
  position: sticky;
  top: 0;
  text-align: left;
}

th,
td {
  padding: 5px;
}

td {
  cursor: pointer;
}

tbody tr:nth-child(even):hover,
tbody tr:hover {
  color: white;
  background-color: var(--main-lighten);
}
</style>