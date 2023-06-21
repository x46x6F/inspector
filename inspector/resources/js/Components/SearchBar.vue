<script setup lang="ts">
import { ref } from 'vue';

let search = ref('')

const emit = defineEmits(['write'])
</script>

<template>
  <div class="search">
    <span class="material-symbols-outlined">
    search
    </span>
    <input type="search" name="search" v-model="search" @input="emit('write', search)">
  </div>
</template>


<style scoped>
.search {
  position: relative;
  display: flex;
  align-items: center;
}
span {
  position: absolute;
  left: 0;
  padding-left: 10px;
}
input {
  border-radius: 5px;
  text-indent: 30px;
}
</style>