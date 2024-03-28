<script setup>
import CreateTaskButton from './CreateTaskButton.vue'
import CardTask from './CardTask.vue'

defineProps({
  title: String,
  statusId: Number,
  tasks: Array
})

defineEmits(['setModalEditTrue', 'setModalCreateTrue'])

</script>

<template>
  <section class="flex flex-col gap-2">
    <div class="flex items-center gap-2">
      <img src="../icons/point.svg" class="h-3 w-3" alt="Point icon" />
      <h3>{{ title }}</h3>
    </div>

    <create-task-button @click="$emit('setModalCreateTrue', {val: true, statusVal: statusId})" />

    <template v-for="task of tasks" :key="task.id">
      <card-task @click="$emit('setModalEditTrue', {val: true, task: task})" v-if="task.status.description === title" :task="task" />
    </template>
  </section>
</template>
