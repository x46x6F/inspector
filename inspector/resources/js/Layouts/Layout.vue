<script setup>
import NavBar from '@/Components/NavBar.vue';

</script>

<template>
        <section id="layout">
          <NavBar/>
          <section id="page">
              <slot />
            </section>
        </section>
</template>

<style scoped>
section {
  width: 100%;
}
</style>
