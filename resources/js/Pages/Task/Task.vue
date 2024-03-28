<script setup>
import { ref, defineProps } from 'vue'

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import StatusSection from '@/components/admin/StatusSection.vue';
import EditTask from '@/components/admin/EditTask.vue';
import CreateTask from '@/components/admin/CreateTask.vue';

const showModalEdit = ref(false)
const showModalCreate = ref(false)
const statuses = ref(null)

const statusSelected = ref(null)
const taskSelected = ref(null)

const props = defineProps({
  tasks: Object
})

function handleModal({val, task}) {
  showModalEdit.value = val
  taskSelected.value = task
}

function handleModalCreate({val, statusVal}) {
  statusSelected.value = statusVal
  showModalCreate.value = val
}

if (props.tasks) {
  fetch('http://localhost:8000/statuses')
  .then(res => res.json())
  .then((d) => {
    statuses.value = d.data
  }).catch((err) => {
    console.error('error: ', err)
  })
}
</script>

<template>
  <AuthenticatedLayout>
    <section
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
      <!-- <div
        class="flex flex-col bg-white px-7 py-5 h-full w-7/12 absolute right-0 overflow-y-scroll no-scrollbar"
        v-if="showModalCreate"
      >
        <create-task :statusId="statusSelected" :dashboardId="props.dashboardId" @toggle-modal-create="(val) => (showModalCreate = val)" />
      </div> -->
    </section>
  </AuthenticatedLayout>
</template>
