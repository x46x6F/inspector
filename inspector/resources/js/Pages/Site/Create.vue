<script setup lang="ts">
import TitlePage from '@/Components/TitlePage.vue';
import DynamicTable from '@/Components/DynamicTable.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Layout from '@/Layouts/Layout.vue';
import { Head, useForm } from '@inertiajs/vue3';

// const props = defineProps <{
//   sites: Array<any>,
// }>()

const form = useForm ({
  name:'',
  number: '',
  address: '',
  address_comp: '',
  zip_code: '',
  city: '',
})
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

      <PrimaryButton :class="{ 'opacity-25': form.processing }">
        Ajouter
      </PrimaryButton>
    </form>
  </Layout>
</template>

<style scoped>
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
</style>