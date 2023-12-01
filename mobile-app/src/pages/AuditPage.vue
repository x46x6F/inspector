<template>
  <h1>Audit n°{{ route.params.campaign_id }}</h1>
  <pre v-for="items in pieces" :key="items">{{ items }}</pre>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'

const pieces = ref()

// Pour récupérer les infos de l'url
const route = useRoute()

onMounted(() => {
  fetch(`http://localhost:8000/api/audits/${route.params.campaign_id}`)
    .then(function (response) { return response.json() })
    .then(function (data) { pieces.value = data })
})
</script>

<style scoped>

</style>
