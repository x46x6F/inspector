<template>
  <div class="upload">
    <label id="label" for="upload">Importer .csv</label>
    <input id="upload" type="file" name="file">
  </div>
</template>

<style scoped>
label {
  /* border: 1px solid var(--main-primary); */
  outline: thick double var(--main-primary);
  background-color: var(--main-primary);
  color: white;
  border-radius: 5px;
  padding: 5px;
  cursor: pointer;
}
label:hover {
  outline: thick double var(--main-lighten);
  background-color: var(--main-lighten);
  color: white;
}
input {
  display: none;
}
</style>