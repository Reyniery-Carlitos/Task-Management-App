<script setup>
import {ref} from 'vue'
import ModalTask from '../layouts/admin/ModalTask.vue'
import imagePath from '../../consts/imagePath';

const props = defineProps({
  task: Object
})

const description = ref(props.task.description || '')
defineEmits(['toggleModalEdit'])

function inputFileClick() {
  document.getElementById('fileInput').click()
}
</script>

<template>
  <ModalTask v-if="props.task">
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
            @click="$emit('toggleModalEdit', false)"
          />
        </div>
      </div>
    </template>

    <template v-slot:content>
      <div class="flex justify-between items-center border-b py-2 border-b-gray-200 w-full">
        <input
          type="text"
          :value="props.task.title"
          class="w-full h-12 outline-none text-2xl px-2 border-transparent"
        />
      </div>

      <div class="flex items-center h-12 border-b py-2 border-b-gray-200 w-full">
        <h3 class="w-2/5 text-gray-500">Assignee</h3>

        <ul class="flex items-center gap-1 w-3/5s">
          <li v-for="u of props.task.users" :key="u.id">
            <img :src="imagePath + u.avatar" class="h-6 w-6 bg-gray-100 rounded-full" /></li>
          <li
            class="h-6 w-6 bg-gray-100 content-center text-center text-xs rounded-full font-medium"
          >
            <img src="../icons/plus_icon.svg" class="h-6 w-6 bg-gray-100 rounded-full" />
          </li>
        </ul>
      </div>

      <div class="flex items-center h-12 border-b py-2 border-b-gray-200 w-full">
        <h3 class="w-2/5 text-gray-500">Due Date</h3>
        <input type="date" class="outline-none border-transparent" :value="props.task.dueDate" />
      </div>

      <div class="flex flex-col gap-3 border-b py-2 border-b-gray-200 w-full">
        <h3 class="text-gray-500">Description</h3>
        <textarea
          name=""
          rows="7"
          class="p-2 resize-none outline-none border border-gray-200 rounded-md no-scrollbar"
          v-model="description"
        ></textarea>
      </div>
    </template>

    <template v-slot:footer>
      <div class="flex flex-col justify-start items-start gap-3 border-b py-2 border-b-gray-200 w-full">
        <h3 class="text-gray-500">Attachments</h3>
        <ul class="columns-2 col-span-2 items-center gap-3" v-if="props.task.attachments.length > 0">
          <template v-for="f of props.task.attachments" :key="f.id">
            <li class="mt-2 w-full flex items-center gap-2 bg-slate-100 p-2 rounded-lg" v-if="f.urlFile.split('.'.at(-1)) === 'pdf'">
              <img src="../icons/pdf_icon.svg" class="h-10 w-10" alt="Pdf icon" />
              <span> {{ f.urlFile.split('/').at(-1) }} </span>
            </li>  
            
            <li class="mt-2" v-else>
              <img :src="imagePath + f.urlFile" class="w-full h-auto bg-gray-100 rounded-lg" />
            </li>
          </template>

        </ul>
      </div>

      <div class="flex flex-col justify-start items-center gap-2 py-2 border-b-gray-200 w-full">
        <h3 class="text-gray-500 self-start">Comments</h3>
        <div
          class="flex p-2 rounded-md border border-slate-200 flex-col items-center w-11/12 gap-1"
        >
          <textarea
            name=""
            rows="2"
            class="p-2 w-full resize-none outline-none rounded-md no-scrollbar border-transparent "
          ></textarea>
          <button
            class="self-end bg-indigo-600/90 p-1 px-2 rounded-lg text-white font-semibold text-sm"
          >
            Comment
          </button>
        </div>
      </div>

      <div
        class="flex flex-col justify-start items-start gap-2 border-b py-2 border-b-gray-200 w-full"
      >
        <ul class="flex flex-col items-center gap-1 w-full" v-if="props.task.comments.length > 0">
          <li class="mt-2 w-full border border-slate-200 p-2 rounded-lg" v-for="comment of props.task.comments" :key="comment.id">
            <div class="flex gap-3">
              <img :src="imagePath + comment.user.avatar" class="h-9 w-9 rounded-full" alt="User image" />

              <div class="flex flex-col gap-2 w-4/5">
                <h3 class="text-md">{{ comment.user.name || '' }} {{ comment.user.lastname || '' }}</h3>
                <p class="text-gray-600">{{comment.content}}</p>
              </div>

              <img src="../icons/trash.svg" class="h-5 w-5" alt="Eliminar comentario" />
            </div>
          </li>
        </ul>
      </div>
    </template>
  </ModalTask>
</template>
