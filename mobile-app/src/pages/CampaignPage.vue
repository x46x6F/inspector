<template>
  <!-- <p v-if="audit.length > 0">{{ audit[0].campaign.name }}</p> -->
  <h1>Liste des campagnes</h1>
  <ul>
    <li v-for="item in audit" :key="item">
      <a :href="'/audits/' + item.campaign.id">{{ item.campaign.name }}</a>
    </li>
  </ul>

</template>

<script setup lang="ts">
import { ref } from 'vue'

// const audit = ref()

// onMounted(() => {
//   fetch('http://localhost:8000/api/audits', {
//     method: 'get',
//     headers: {
//       'Accept': 'application/json',
//       'Authorization': `Bearer ${authToken}`
//     }
//   })
//     .then(function (response) { return response.json() })
//     .then(function (data) { audit.value = data })
// })
const authToken = localStorage.getItem('authToken') // Récupérer le token d'authentification depuis le localStorage
const audit = ref([]) // Variable réactive pour stocker les données récupérées

const fetchData = async () => {
  try {
    const response = await fetch('http://localhost:8000/api/audits', {
      method: 'GET',
      headers: {
        Accept: 'application/json',
        Authorization: `Bearer ${authToken}` // Inclure le token d'authentification dans l'en-tête Authorization
      }
    })

    if (response.ok) {
      const data = await response.json()
      audit.value = data // Mettre à jour les données dans la variable réactive
    } else {
      // Gérer les erreurs de la requête
      console.error('Failed to fetch data')
    }
  } catch (error) {
    // Gérer les erreurs de la requête
    console.error('Request error:', error)
  }
}

fetchData()

</script>

<style scoped>

</style>
