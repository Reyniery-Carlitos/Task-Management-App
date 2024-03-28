<script setup>
import {ref} from 'vue'
import CardDashboard from '@/components/admin/CardDashboard.vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import {Inertia} from '@inertiajs/inertia'
defineEmits(['showTasks'])

const isLoading = ref(true)
const dashboards = ref([])
const showTasks = ref(false)

const props = defineProps({
  dashboards: Object
})

function redirectToTasks(idDashboard) {
  const pageUrl = `/tasks/dashboard/${idDashboard}`
  Inertia.visit(pageUrl)
}

if (props.dashboards) {
  isLoading.value  = false
  dashboards.value = props.dashboards
}
</script>

<template>
  <AuthenticatedLayout>
    <section class="grid grid-cols-4 gap-3 bg-gray-100 px-7 py-5 h-full">
      <h1 v-if="isLoading"> Loading... </h1>
      <template v-else>
        <card-dashboard v-for="dashboard of dashboards" @click="redirectToTasks(dashboard.id)" :data="dashboard" :key="dashboard.id" />
      </template>
    </section>
  </AuthenticatedLayout>
</template>
