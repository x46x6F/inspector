<script setup lang="ts">
import { router } from '@inertiajs/vue3'; 
</script>

<template>
  <img @click="router.post(route('logout'))" class="logout" src="../../assets/img/logout.png" alt="logout">
</template>

<style scoped>
img {
  height: 50px;
  cursor: pointer;
}
</style>