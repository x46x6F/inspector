<script setup lang="ts">
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Logout from '@/Components/Logout.vue';
import Layout from '@/Layouts/HomeLayout.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, router } from '@inertiajs/vue3';


</script>

<template>
  <Head title="Accueil" />
  <header class="header">
      <ApplicationLogo />
      <Logout />
  </header>
  <Layout>
    <section class="nav">
      <nav class="btn-home">
        <PrimaryButton @click="router.visit(route('campaigns.index'))">
          <span>C</span>ampagnes
        </PrimaryButton>
        <PrimaryButton @click="router.visit(route('pieces.index'))">
          <span>R</span>éférentiel &nbsp;<span>P</span>ièces
        </PrimaryButton>
        <PrimaryButton @click="router.visit(route('materials.index'))">
          <span>R</span>éférentiel &nbsp;<span>M</span>atériels
        </PrimaryButton>
        <PrimaryButton @click="router.visit(route('dash.index'))">
          <Link href="/dash"><span>T</span>ableau &nbsp;<span>d</span>e &nbsp;<span>B</span>ord</Link>
        </PrimaryButton>
      </nav>
    </section>
  </Layout>
</template>

<style scoped>

/* HTML tag */

header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 2rem;
}
button {
  justify-content: center;
  height: 40%;
  width: 40%;
  margin: 0 1.2rem;
  font-size: 1.3rem;
}
span {
  color: var(--main-secondary);
}



/* CLASS */

.logo {
  width: 20%;
  padding: 1.5rem;
}
.btn-home {
  width: 60vw;
  height: 48vh;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: center;
}
.nav {
  width: 100vw;
  height: 75vh;
  display: flex;
  align-items: center;
  justify-content: center;
}

</style>