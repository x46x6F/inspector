<script setup>

</script>

<template>
  <nav>
    <div class="nav-top">
      <a href="">
        <img src="../../assets/img/logo_mini.png" alt="">
      </a>
      <span></span>
    </div>
    <div class="nav">
      <a href="#">Campagnes</a>
      <a href="#">Référentiel pièces</a>
      <a href="#">Référentiel matériels</a>
      <a href="#">Qualité & sécurité</a>
    </div>
      <div class="nav-bottom">
      <span></span>
      <a class="logout" href="#">Déconnexion</a>
    </div>
  </nav>
</template>

<style scoped>
nav {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  gap: 10px;
  width: 20%;
  height: 100vh;
  background-color: var(--main-primary);
  color: white;
  font-size: 1.2rem;
}

img {
  padding: 3rem;
  margin: 0 auto;
}

span {
  display: block;
  background-color: white;
  width: 85%;
  height: 1px;
  margin: 0 auto;
}

.logout {
  color: var(--main-secondary);
  bottom: 0;
}

a:hover {
  color: var(--main-lighten);
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
</style>