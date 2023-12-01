<template>
  <div>
    <h1>My App</h1>
    <nav>
      <router-link to="/">Home</router-link>
      <router-link to="/camp">About</router-link>
    </nav>
    <router-view></router-view>
  </div>
  <div>
    <h1>Login</h1>
    <form @submit="login">
      <div>
        <label for="name">Username</label>
        <input type="text" id="name" v-model="name" />
      </div>
      <div>
        <label for="password">Password</label>
        <input type="password" id="password" v-model="password" />
      </div>
      <button type="submit">Login</button>
    </form>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const name = ref('')
const password = ref('')
const authToken = ref(null)

const login = async (event) => {
  event.preventDefault()

  try {
    const response = await fetch('http://localhost:8000/api/tokens/create', {
      method: 'POST',
      credentials: 'include',
      headers: {
        'Content-Type': 'application/json',
        Accept: 'application/json'
      },
      body: JSON.stringify({
        name: name.value,
        password: password.value
      })
    })

    if (response.ok) {
      const data = await response.json()
      authToken.value = data.access_token
      localStorage.setItem('authToken', data.access_token)
      console.log('Logged in successfully')
      // Rediriger ou effectuer d'autres actions après la connexion réussie
    } else {
      // Erreur lors de la connexion
      console.error('Failed to login')
    }
  } catch (error) {
    // Erreur lors de la requête
    console.error('Request error:', error)
  }
}

const fetchData = async () => {
  try {
    const response = await fetch('http://localhost:8000/sanctum/csrf-cookie', {
      method: 'GET',
      headers: {
        Accept: 'application/json'
      }
    })

    if (response.ok) {
      // Le cookie CSRF a été configuré avec succès
      console.log('CSRF cookie set')
    } else {
      // Une erreur s'est produite lors de la configuration du cookie CSRF
      console.error('Failed to set CSRF cookie')
    }
  } catch (error) {
    // Une erreur s'est produite lors de la requête
    console.error('Request error:', error)
  }
}

fetchData()
</script>

<style scoped>
/* Votre style CSS ici */
</style>
