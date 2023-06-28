<script setup lang="ts">
const props = defineProps<{
  piece: Object
}>()
</script>
<template>
  <!-- <Head :title=piece.name  /> -->
  <h1>{{ piece.name }}</h1>

</template>


<style scoped></style>
