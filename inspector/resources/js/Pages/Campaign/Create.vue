<script setup lang="ts">
import TitlePage from '@/Components/TitlePage.vue';
import DynamicTable from '@/Components/DynamicTable.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Layout from '@/Layouts/Layout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps<{
  sites: Array<any>,
  materials: Array<any>,
}>()

const head = {
  name: 'Nom',
  model_id: 'Modèle',
  status: 'Status',
}

const form = useForm({
  name: '',
  start_date: '',
  end_date: '',
  site_id: null,
});

</script>

<template>
  <Head title="Campagne" />
  <Layout>
    <TitlePage>
      Créer une campagne
    </TitlePage>

    <form method="post">

      <InputLabel for="name" value="Nom" />

      <TextInput id="name" type="text" class="" v-model="form.name" required autofocus
        autocomplete="off" />

      <InputLabel for="start-date" value="Date de début" />

      <TextInput id="start-date" type="date" class="" v-model="form.start_date" required
        autocomplete="off" />

      <InputLabel for="end-date" value="Date de fin" />

      <TextInput id="end-date" type="date" class="" v-model="form.end_date" required
        autocomplete="off" />

      <InputLabel for="site" value="Site" />

      <select v-model="form.site_id" name="site_id" id="site">
        <option selected>-- Sélectionner un site --</option>
        <option :value="site.id" v-for="site in sites" :key="site.id">{{ site.name }}</option>
      </select>

      <DynamicTable v-if="form.site_id" :headers="head" :data="props.materials" />

      <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
        Créer
      </PrimaryButton>

    </form>
  </Layout>
</template>

<style scoped>
form {
  display: flex;
  flex-direction: column;
  width: 50%;
}
</style>