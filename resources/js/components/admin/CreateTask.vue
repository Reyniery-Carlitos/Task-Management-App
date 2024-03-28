<script setup>
import ModalTask from '../layouts/admin/ModalTask.vue'
// import {ref} from 'vue'
// import csrfToken from '../../consts/token.js'

// defineEmits(['toggleModalCreate'])
// const props = defineProps({
//   statusId: Number,
//   dashboardId: Number
// })


// const title = ref('')
// const description = ref('')
// const dueDate = ref(null)

// function handleSubmit () {
//   const taskData = {
//     title: title.value,
//     description: description.value,
//     dueDate: dueDate.value,
//     status: props.statusId,
//     dashboard: props.dashboardId
//   }
//   console.log(taskData)

//   fetch('http://localhost:8000/tasks', {
//     method: 'POST',
//     headers: {
//       'Content-Type': 'application/json',
//       'X-CSRF-TOKEN': csrfToken
//     },
//     body: JSON.stringify(taskData)
//   })
//   .then(res => res.json())
//   .then((data) => {
//     console.log(data)
//   }).catch(err => console.error('error: ', err))
// }

// function inputFileClick() {
//   document.getElementById('fileInput').click()
// }
</script>

<template>
  <h1> Create task </h1>
  <!-- <ModalTask>
    <template v-slot:header>
      <div class="flex justify-between items-center border-b py-2 border-b-gray-200 w-full">
        <div class="flex justify-center gap-2 p-1 rounded-md border border-gray-200">
          <img src="../icons/check.svg" alt="Check icon" />
          <span class="text-sm">Mark Complete</span>
        </div>

        <div class="flex gap-2">
          <img
            src="../icons/attach.svg"
            class="h-6 w-6"
            alt="Attach icon"
            @click="inputFileClick"
          />
          <input type="file" id="fileInput" class="hidden" />

          <img
            src="../icons/salir.svg"
            class="h-6 w-6"
            alt="Exit icon"
            @click="$emit('toggleModalCreate', false)"
          />
        </div>
      </div>
    </template>

    <template v-slot:content>
      <div class="flex justify-between items-center border-b py-2 border-b-gray-200 w-full">
        <input
          type="text"
          value=""
          placeholder="Task title"
          class="w-full h-12 outline-none text-2xl px-2"
          v-model="title"
        />
      </div>

      <div class="flex items-center h-12 border-b py-2 border-b-gray-200 w-full">
        <h3 class="w-2/5 text-gray-500">Assignee</h3>

        <ul class="flex items-center gap-1 w-3/5s">
          <li><img src="../../assets//logo.svg" class="h-6 w-6 bg-gray-100 rounded-full" /></li>

          <li
            class="h-6 w-6 bg-gray-100 content-center text-center text-xs rounded-full font-medium"
          >
            <img src="../icons/plus_icon.svg" class="h-6 w-6 bg-gray-100 rounded-full" />
          </li>
        </ul>
      </div>

      <div class="flex items-center h-12 border-b py-2 border-b-gray-200 w-full">
        <h3 class="w-2/5 text-gray-500">Due Date</h3>
        <input type="date" class="outline-none" v-model="dueDate" />
      </div>

      <div class="flex flex-col gap-3 border-b py-2 border-b-gray-200 w-full">
        <h3 class="text-gray-500">Description</h3>
        <textarea
          name=""
          rows="7"
          class="p-2 resize-none outline-none border border-gray-200 rounded-md no-scrollbar"
          placeholder="Task description"
          v-model="description"
        >
        </textarea>
      </div>
      <button @click.prevent="handleSubmit"
            class="bg-yellow-600/90 p-1 px-2 rounded-lg text-white font-semibold text-sm mt-2 content-end"
          >
            Crear
      </button>
    </template>
  </ModalTask> -->
</template>
