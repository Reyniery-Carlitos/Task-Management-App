<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Inertia } from "@inertiajs/inertia";
import {ref} from 'vue'

const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const title = ref('')
const description = ref('')
const file = ref('')
const owner = ref(localStorage.getItem('userId'))

function redirectToDashboards() {
  Inertia.visit(route('dashboards.owner.list'))
}

function handleFile(e) {
  file.value = e.target.files[0]
}

function handleSubmit() {
  const formData = new FormData()
  formData.append('title', title)
  formData.append('description', description)
  formData.append('file', file)
  formData.append('owner', owner)
  console.log(formData, csrfToken)

  try {
    fetch('http://localhost:8000/dashboards', {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': csrfToken
      },
      body: formData
    }).then((data) => {
      console.log(data)
      // redirectToDashboards()
    }).catch(err => console.error(err)) 
    
  } catch(err) {
    console.error('error: ', err)
  }
}

  
  function inputFileClick() {
    document.getElementById('fileInput').click()
  }
</script>

<template>
  <AuthenticatedLayout>
    <div class="min-w-full h-full bg-slate-100 flex flex-col justify-center items-center">
      <div class="w-6/12 bg-white p-10 rounded-xl flex flex-col items-center">
        <img src="../../components/icons/salir.svg" class="h-6 w-6 self-end" alt="Exit icon" @click="redirectToDashboards"/>
        
        <h3 class="text-gray-900 self-center text-xl uppercase font-bold">Create Dashboard </h3>

        <div class="flex w-full items-center justify-between pt-5">
          <div class="flex justify-between items-center border-b py-2 border-b-gray-200">
            <input type="text" value="" placeholder="Dashboard title"
              class="w-full h-12 outline-none text-2xl px-2 border-transparent rounded-sm" v-model="title" />
          </div>

          <img src="../../components/icons/attach.svg" class="h-6 w-6" alt="Attach icon" @click="inputFileClick" />
          <input type="file" id="fileInput" class="hidden" @change="handleFile" />
        </div>

        <div class="flex flex-col gap-3 border-b py-2 border-b-gray-200 w-full">
          <!-- <h3 class="text-gray-500">Description</h3> -->
          <textarea name="" rows="7" class="p-2 resize-none outline-none border border-gray-200 rounded-md no-scrollbar"
            placeholder="Description" v-model="description">
            </textarea>
        </div>

        <button @click.prevent="handleSubmit"
          class="bg-yellow-600/90 p-1 px-2 rounded-lg text-white font-semibold text-sm mt-2 self-center">
          Crear
        </button>
      </div>
    </div>
  </AuthenticatedLayout>
</template>