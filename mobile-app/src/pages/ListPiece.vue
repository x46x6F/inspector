<template>
<h1>Liste des pièces</h1>

{{ campaignId }}
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'

const route = useRoute()

const campaignId = ref(route.params.campaign_id)
// const audit = ref()

// onMounted(() => {
//   fetch('http://localhost:8000/api/audits')
//     .then(function (response) { return response.json() })
//     .then(function (data) { audit.value = data })
// })
</script>

<style scoped>

</style>
