<script setup>

</script>

<template>
  <nav>
    <div class="nav-top">
      <div class="logo-mini">
        <a href="/">
          <img src="../../assets/img/logo_mini.png" alt="mini_logo">
        </a>
      </div>
      <span></span>
    </div>
    <div class="nav">
      <a id="campaign" href="campaigns">Campagnes</a>
      <a id="piece" href="pieces">Référentiel pièces</a>
      <a id="material" href="#">Référentiel matériels</a>
      <a id="dash" href="#">Qualité & sécurité</a>
    </div>
      <div class="nav-bottom">
      <span></span>
      <a class="logout" href="#">Déconnexion</a>
    </div>
  </nav>
</template>

<style scoped>

/* HTML tag */
nav {
  /* position: fixed; */
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  gap: 10px;
  min-width: 300px;
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
</style>