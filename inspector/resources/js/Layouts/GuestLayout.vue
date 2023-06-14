<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 background">
        <div class="mb-16">
            <Link href="/">
                <ApplicationLogo />
            </Link>
        </div>

        <div>
            <slot />
        </div>
    </div>
</template>

<style scoped>

</style>
