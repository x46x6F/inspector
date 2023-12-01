<script setup lang="ts">
import TitlePage from '@/Components/TitlePage.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Layout from '@/Layouts/Layout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue'

const props = defineProps<{
  materials: Array<any>,
}>()

// let materialsOnSite = ref([])
const type = ref('')

const form = useForm ({
  name:'',
  number: '',
  address: '',
  address_comp: '',
  zip_code: '',
  city: '',
  materials: []
})

const addMater = () => {
  form.materials.push(type.value)
  type.value = ''
}

const pop = value => {
  const index = form.materials.indexOf(value)
  form.materials.splice(index, 1)
}

</script>

<template>
  <Head title="Ajout de site" />
  <Layout>
    <TitlePage>
      Ajouter un site
    </TitlePage>
    <form @submit.prevent="form.post(route('sites.store'))">

      <InputLabel for="name" value="Nom"/>
      <TextInput id="name" type="text" v-model="form.name" required autofocus/>

      <InputLabel for="number" value="N° de voie"/>
      <TextInput style="appearance: textfield;" id="number" type="number" v-model="form.number" required />

      <InputLabel for="address" value="Adresse"/>
      <TextInput id="address" type="text" v-model="form.address" required />
      <InputLabel for="comp-address" value="Complément d'adresse"/>

      <TextInput id="comp-address" type="text" v-model="form.address_comp" />
      <InputLabel for="zip-code" value="Code postal"/>
      <TextInput style="appearance: textfield;" id="zip-code" type="number" v-model="form.zip_code" required />

      <InputLabel for="city" value="Ville"/>
      <TextInput id="city" type="text" v-model="form.city" required />

      <!-- <InputLabel for="material" value="Matériel :" />
      <select v-model="materialsOnSite" id="material" multiple>
        <option v-for="material in materials" :key="material.id" :value="material.name">{{ material.name }}</option>
      </select> -->

      <InputLabel for="material" value="Matériel :" />
      <TextInput v-model="type" list="list-material" id="datalist" />
      <datalist id="list-material">
        <option v-for="material in materials" :key="material.id" :value="`${material.id} - ${material.name}`">{{ material.name }}</option>
      </datalist>
      <button id="btn" @click="addMater" :disabled="type == ''">+</button>

      <div class="list" v-if="form.materials.length > 0">
        <div class="test" v-for="material in form.materials">
          <article>{{ material }}</article>
          <div class="material-symbols-outlined" @click="pop(material)">Delete</div>
        </div>
      </div>

      <PrimaryButton :class="{ 'opacity-25': form.processing }">
        Ajouter
      </PrimaryButton>
    </form>
  </Layout>
</template>

<style scoped>
.list {
  margin: 2rem;
}
button:disabled {
  border: 1px solid lightgrey;
  color: lightgrey;
}

button:disabled:hover {
  border: 1px solid lightgrey;
  background-color: white;
  outline: none;
  color: lightgrey;
  cursor: not-allowed;
}
#datalist {
  border: 1px solid lightgrey;
  height: 42px;
}

#btn {
  border: 1px solid lightgrey;
  border-radius: 5px;
  margin-bottom: 2rem;
  font-size: 1.2rem;
}
button:hover {
  background-color: var(--main-light);
  border: 2px solid white;
  outline: solid var(--main-lighten);
  cursor: pointer;
}
.test {
  display: flex;
  /* background-color: var(--main-light); */
  justify-content: space-between;
  /* gap: 5px; */
}
.test div {
  /* color: var(--main-lighten); */
  cursor: pointer;
}

.test:nth-child(even) {
  background-color: var(--main-light);
}
form {
  width: 100%;
  padding: 0 20rem 10rem;
  display: flex;
  flex-direction: column;
}

label {
  margin-bottom: 0.8rem;
}

input {
  margin-bottom: 1.2rem;
}

.material-symbols-outlined {
  cursor: pointer;
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 48
}

.material-symbols-outlined:hover {
  border-radius: 50%;
  background-color: var(--main-lighten);
}
</style>