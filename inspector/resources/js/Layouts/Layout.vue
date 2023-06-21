<script setup>
import NavBar from '@/Components/NavBar.vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  role_id: {
        type: Number,
        default: 0,
    },
})
</script>

<template>
        <section id="layout">
          <NavBar :role_id="props.role_id"/>
          <section id="page">
              <slot />
            </section>
        </section>
</template>
