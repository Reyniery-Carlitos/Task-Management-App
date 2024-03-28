<script setup>
import {useStore} from 'vuex'
import {onMounted, ref, defineEmits} from 'vue'
import CardDashboard from './CardDashboard.vue'

defineEmits(['showTasks'])

const isLoading = ref(true)
const dashboards = ref([])

</script>

<template>
  <section class="grid grid-cols-4 gap-3 bg-gray-100 px-7 py-5 h-full">
    <h1 v-if="isLoading"> Loading... </h1>
    <template v-else>
      <card-dashboard v-for="dashboard of dashboards" @click="$emit('showTasks', {idDashboard: dashboard.id, value:false})" :data="dashboard" :key="dashboard.id" />
    </template>
  </section>
</template>
