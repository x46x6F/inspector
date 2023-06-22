<script setup lang="ts">
import SearchBar from '@/Components/SearchBar.vue';
import UploadButton from '@/Components/UploadButton.vue';
import Layout from '@/Layouts/Layout.vue';
import Modal from '@/Components/Modal.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import { Head, router, usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

const props = defineProps<{
  users: Array<any>,
}>()

const head =
{
  name: 'Nom',
  email: 'Email',
  role: 'Role'
}

const modal = ref(false)

let user: any;

const openModal = (item:any) => {
  modal.value = true;
  return user = item;
}

const closeModal = () => {
  modal.value = false;
}

const users = computed(() => {
  return props.users.map(u => {return {...u, role:u.role.role}})
})

const deleteU = user => {
  router.delete(route('admin.destroy', { admin: user}))
  closeModal()
}

const page = usePage()

const watcher = (search) => {
  
  router.get(
    "/admin",
    { search: search},
    { preserveState: true, replace: true}
  )
}
</script>

<template>
  <Head title="admin" />
  <Layout>
    <h1>Liste des Utilisateurs</h1>
    <div class="option">
      <!-- <UploadButton  v-if="isSuperAdmin"/> -->
      <UploadButton  v-if="page.props.auth?.user.canImportData"/>
      <SearchBar @write="watcher"/>
    </div>
    <div class="container">
      <div id="table">
        <table>
          <thead>
            <tr>
              <th v-for="header in head" :key="header">{{ header }}</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in users" :key="item">
              <td v-for="_, key in head" :key="key"> {{
                item[key] }}</td>
              <td id="trash" class="material-symbols-outlined" @click="openModal">
                delete
              </td>
              <Modal :show="modal" @close="closeModal">
                <h2 @click="closeModal">&times;</h2>
                <p>Etes-vous sûr de vouloir supprimer cet utilisateur ?</p>
                <PrimaryButton @click="deleteU(item)">
                  Oui
                </PrimaryButton>
                <DangerButton @click="closeModal">
                  Non
                </DangerButton>
              </Modal>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </Layout>
</template>

<style scoped>

h1 {
  padding: 2.8rem 4rem;
  text-align: center;
  font-size: 2.5rem;
  font-weight: 900;
}

.container {
  border: 1px solid red;
  height: 80vh;
  display: flex;
  align-items: center;
  justify-content: center;
}
#table {
  width: 80vw;
  max-height: 59vh;
  display: flex;
  justify-content: center;
  overflow-y: scroll;
  overflow-x: hidden;
}

table {
  width: 75vw;
}

tbody {
  border-collapse: collapse;
  width: 80vw;
}

tbody tr:nth-child(even) {
  background-color: var(--main-light);
}

th {
  background-color: white;
  position: sticky;
  top: 0;
  text-align: left;
}

th,
td {
  padding: 5px;
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