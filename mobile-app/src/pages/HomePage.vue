<template>
  <main>
    <LogoComponent />
    <form @submit="login">
      <label for="email">Nom :</label>
      <input type="email" name="email" id="email" v-model="email">
      <label for="pwd">Mot de passe :</label>
      <input type="password" name="pwd" id="pwd" v-model="password">
      <button type="submit">Se connecter</button>
    </form>
  </main>
</template>

<script setup lang="ts">
import LogoComponent from '../components/LogoComponent.vue'
import { ref } from 'vue'

const email = ref('')
const password = ref('')
const authToken = ref(null)

const login = async (event: any) => {
  event.preventDefault()

  try {
    const response = await fetch('http://localhost:8000/api/tokens/create', {
      method: 'POST',
      credentials: 'include',
      headers: {
        'Content-Type': 'application/json'
        // 'Accept': 'application/json'
      },
      body: JSON.stringify({
        email: email.value,
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
        // 'Accept': 'application/json',
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
img {
  position: absolute;
  top: 30vh;
  margin-bottom: 1.5rem;
  animation: anim1 5s forwards;
}

main {
  width: 100%;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}

form {
  position: absolute;
  bottom: 30vh;
  display: flex;
  flex-direction: column;
  gap: 10px;
  animation: anim 5s forwards;
}

@keyframes anim {
  0% {
    position: absolute;
  }

  100% {
    position: absolute;
  }
}

@keyframes anim1 {
  0% {
    position: absolute;
  }

  100% {
    position: absolute;
    top: 30vh;
  }
}
</style>
