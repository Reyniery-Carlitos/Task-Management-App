<script setup>
  import imagePath from "../../consts/imagePath"
  defineProps({
    data: Object
  })
  
</script>

<template>
  <div v-if="data" class="h-56 w-full flex flex-col bg-white gap-2 rounded-lg shadow-sm">
    <img :src="imagePath + data.avatar" class="w-full h-36 object-center rounded-t-lg" alt="Imagen random" />
    <div class="px-3 flex flex-col gap-2 ">
      <h2 class="text-md font-semibold">{{ data.title }}</h2>
      <p class="text-gray-500"> {{ data.description }} </p>
    </div>
  </div>
</template>
