<script setup lang="ts">
import { router } from '@inertiajs/vue3'; 
</script>

<template>
  <img @click="router.visit(route('home.index'))" class="logout" src="../../assets/img/logout.png" alt="logout">
</template>

<style scoped>
img {
  height: 50px;
  cursor: pointer;
}
</style>