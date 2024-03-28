<script setup>
import StatusSection from './StatusSection.vue'
import { onMounted, ref, defineProps } from 'vue'
import EditTask from './EditTask.vue'
import CreateTask from './CreateTask.vue'

const showModalEdit = ref(false)
const showModalCreate = ref(false)

const statuses = ref(null)
const tasks = ref([])
const taskSelected = ref(null)
const statusSelected = ref(null)

const props = defineProps({
  dashboardId: Number
})

// Fetch tareas por dashboard
const fetchTasksByDashboard = async() => {
  try {
    console.log(props.dashboardId)
    if (props.dashboardId) {
      const response = await fetch(`http://localhost:8000/tasks/dashboard/${props.dashboardId}`)
      const data = await response.json()
      tasks.value = data.data
    }
  } catch(err) {
    console.error('error: ' + err)
  }
}

// Fetch status
const fetchStatuses = async() => {
  try {
    const response = await fetch('http://localhost:8000/statuses')
    const data = await response.json()
    statuses.value = data.data
  } catch(err) {
    console.error('error: ', err)
  }
}

function handleModal({val, task}) {
  showModalEdit.value = val
  taskSelected.value = task
}

function handleModalCreate({val, statusVal}) {
  statusSelected.value = statusVal
  showModalCreate.value = val
}

onMounted(() => {
  fetchStatuses()
  fetchTasksByDashboard()
})
</script>

<template>
  <section v-if="statuses"
    class="grid grid-cols-4 gap-3 bg-gray-100 px-7 py-5 h-full relative overflow-y-scroll no-scrollbar"
  >
    <status-section
      v-for="status of statuses"
      :key="status.id"
      :title="status.description"
      :statusId="status.id"
      :tasks="tasks"
      @set-modal-edit-true="handleModal"
      @set-modal-create-true="handleModalCreate"
    />

    <!-- Modal -->
    <div
      class="flex flex-col bg-white px-7 py-5 h-full w-7/12 absolute right-0 overflow-y-scroll no-scrollbar"
      v-if="showModalEdit"
    >
      <edit-task :task="taskSelected" @toggle-modal-edit="(val) => (showModalEdit = val)" />
    </div>

    <!-- Modal -->
    <div
      class="flex flex-col bg-white px-7 py-5 h-full w-7/12 absolute right-0 overflow-y-scroll no-scrollbar"
      v-if="showModalCreate"
    >
      <create-task :statusId="statusSelected" :dashboardId="props.dashboardId" @toggle-modal-create="(val) => (showModalCreate = val)" />
    </div>
  </section>
</template>
