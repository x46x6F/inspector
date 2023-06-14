<script setup>
import NavBar from '@/Components/NavBar.vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
        <section id="layout">
          <NavBar />
          <section id="page">
              <slot />
            </section>
        </section>
</template>
