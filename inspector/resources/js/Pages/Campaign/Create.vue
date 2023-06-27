<script setup lang="ts">
import TitlePage from '@/Components/TitlePage.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Layout from '@/Layouts/Layout.vue';
import { Head, router, useForm } from '@inertiajs/vue3';

const props = defineProps<{
  campaigns: Array<any>,
}>()

const head = {
  name: 'Nom',
  start_date: 'Date début',
  end_date: 'Date fin',
  creator_id: 'Créer par',
  auditor_id: 'Auditeur',
  site_id: 'Site',
  status: 'Status',
}

const form = useForm({
  name: '',
  end_date: '',
  site_id: '',
  creator_id: '',
});

</script>

<template>
  <Head title="Campagne" />
  <Layout>
    <TitlePage>
      Créer une campagne
    </TitlePage>

    <form action="#">

      <InputLabel for="name" value="Nom" />

      <TextInput id="name" type="text" class="" v-model="form.name" required autofocus
        autocomplete="off" />

      <InputLabel for="end-date" value="Deadline" />

      <TextInput id="end-date" type="date" class="" v-model="form.name" required autofocus
        autocomplete="off" />

      <InputLabel for="site" value="Site" />

      <TextInput id="site" type="text" class="" v-model="form.name" required autofocus
        autocomplete="off" />

      <InputLabel for="creator" value="Créer par" />

      <TextInput id="creator" type="text" class="" v-model="form.name" required autofocus
        autocomplete="off" />

      <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
        Créer
      </PrimaryButton>

    </form>
  </Layout>
</template>

<style scoped>
form {
  border: 1px solid red;
  display: flex;
  flex-direction: column;
  width: 50%;
}
</style>