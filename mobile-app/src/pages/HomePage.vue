<template>
  <main>
    <LogoComponent />
    <form method="post">
      <label for="name">Nom :</label>
      <input type="text" name="name" id="name">
      <label for="pwd">Mot de passe :</label>
      <input type="text" name="pwd" id="pwd">
      <button type="submit">Se connecter</button>
    </form>
  </main>
</template>

<script setup lang="ts">
import LogoComponent from '../components/LogoComponent.vue'
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
