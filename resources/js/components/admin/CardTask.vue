<script setup>

import imagePath from "../../consts/imagePath"

const props = defineProps({
  task: Object
})
</script>

<template>
  <div class="flex flex-col gap-2 bg-white shadow-sm rounded-lg px-4 pt-4 pb-2" v-if="props.task">
    <h2 class="text-lg outline-none"> {{ props.task.title }}</h2>
    <p class="text-sm text-slate-600">
      {{ props.task.description }}
    </p>
    <ul class="grid grid-cols-5" v-if="props.task.attachments.length > 0">
      <template v-if="props.task.attachments.length > 4">
        <li class="h-8 w-8 flex items-center justify-center text-sm p-1 rounded-md" v-for="a in 4" :key="props.task.attachments[a].id">
          <template v-if="props.task.attachments[a].urlFile.split('.').at(-1) === 'pdf'">
            <img src="../icons/pdf_icon.svg" class="h-7 w-7 rounded-sm" alt="Imagenes de vue" />
          </template>
          <img v-else :src="imagePath + props.task.attachments.urlFile" class="h-7 w-7 rounded-sm" alt="Imagenes de vue" />
        </li>

        <li class="h-8 w-8 flex items-center justify-center bg-gray-200 text-sm p-1 rounded-md">
          <img src="../icons/plus_icon.svg" class="h-3" alt="Plus icon" /> 
          {{ props.task.attachments.length - 4 }}
        </li>
      </template>

      <template v-else>
        <li v-for="a of props.task.attachments" :key="a.id" class="h-8 w-8 flex items-center justify-center text-sm p-1 rounded-md">
          <img :src="imagePath + a.urlFile" class="h-7 w-7 rounded-sm" alt="Imagenes de vue" />
        </li>
      </template>
    </ul>

    <div class="flex border-t border-gray-300 justify-between w-full pt-3 pb-1 mt-1">
      <ul class="flex self-start items-center">
        <template v-if="props.task.users.length > 2">
          <li v-for="u in 2" :key="props.task.users[u].id"><img :src="imagePath + props.task.users[u].avatar" class="h-6 w-6 bg-gray-100 rounded-full" /></li>
  
            <li
              class="h-6 w-6 bg-gray-100 content-center text-center text-xs rounded-full -translate-x-6 font-medium"
            >
              <span>+{{ props.task.users.length - 2 }}</span>
            </li>
        </template>

        <template v-else>
          <li v-for="user of props.task.users" :key="user.id"><img :src="imagePath + user.avatar" class="h-6 w-6 bg-gray-100 rounded-full" /></li>
        </template>
      </ul>

      <span class="flex gap-1 items-center self-end">
        <img src="../icons/comment_icon.svg" class="h-4 w-4" alt="Comment icon" /> 
        {{ props.task.comments.length }}
      </span>
    </div>
  </div>
</template>
