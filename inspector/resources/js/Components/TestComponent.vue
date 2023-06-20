<script setup lang="ts">
const props = defineProps<{
  header: Object,
  data: Array<string>
}>()
</script>

<template>
    <table>
      <thead>
        <tr>
          <th>Coucou</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>C'est moi</td>
        </tr>
      </tbody>
    </table>
</template>

<style scoped>

</style>