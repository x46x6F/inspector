<script setup>
import { Link, router, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage()


const canViewDashboard = computed(() => {
  // return page.props.auth?.user.canViewDashboard
  return page.props.auth?.user.canViewDashboard
})
</script>

<template>
  <nav>
    <div class="nav-top">
      <div class="logo-mini">
        <a href="/home">
          <img src="../../assets/img/logo_mini.png" alt="mini_logo">
        </a>
      </div>
      <span></span>
    </div>
    <div class="nav">
      <Link href="/campaigns" :class="{ 'active': $page.url.includes('/campaigns') }">Campagnes</Link>
      <Link href="/models/pieces" :class="{ 'active': $page.url.includes('/models/pieces') }">Référentiel pièces</Link>
      <Link href="/models/materials" :class="{ 'active': $page.url.includes('/models/materials') }">Référentiel matériels</Link>
      <Link href="/dash" :class="{ 'active': $page.url.includes('/dash') }" v-if="canViewDashboard">Qualité & sécurité</Link>
      <Link class="unauthorized" href="#" v-else>Qualité & sécurité</Link>
    </div>
      <div class="nav-bottom">
      <span></span>
      <a class="logout" href="#" @click="router.post(route('logout'))">Déconnexion</a>
    </div>
  </nav>
</template>

<style scoped>

/* HTML tag */
nav {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  gap: 10px;
  min-width: 20vw;
  height: 100vh;
  background-color: var(--main-primary);
  color: white;
  font-size: 1.2rem;
}

img {
  margin: 0 auto;
}

span {
  display: block;
  background-color: white;
  width: 85%;
  height: 1px;
  margin: 0 auto;
}


a:hover {
  color: var(--main-lighten);
}



/* CLASS */
.logo-mini {
  padding: 2rem;
}
.logout {
  color: var(--main-secondary);
  bottom: 0;
}
.nav {
  height: 100%;
  padding-left: 2rem;
  padding-top: 2rem;
  display: flex;
  flex-direction: column;
  gap: 2rem;
}
.nav-bottom {
  margin-bottom: 4rem;
}
.logout {
  display: block;
  padding: 1rem 2rem;
}

.unauthorized{
  color: gray;
}

.unauthorized:hover {
  color: gray;
  cursor: not-allowed;
}
</style>