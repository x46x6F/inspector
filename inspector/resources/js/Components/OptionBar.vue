<script setup lang="ts">

</script>
<template>
  <nav class="option">
    <slot />
  </nav>
</template>


<style scoped>
.option {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin: 1rem 2rem;
  padding: 1rem;
  border: 1px solid var(--main-light);
  border-radius: 5px;
  box-shadow: 0px 0px 24px 2px var(--main-light);
  -webkit-box-shadow: 0px 0px 24px 2px var(--main-light);
  -moz-box-shadow: 0px 0px 24px 2px var(--main-light);
}
</style>