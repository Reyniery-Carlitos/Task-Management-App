<script setup>
import {ref} from 'vue';
import LateralPanel from './LateralPanel.vue'
import MainContent from './MainContent.vue'
</script>

<template>
  <section class="grid grid-cols-5 max-w-full min-h-screen">
    <lateral-panel />
    
    <main-content />
  </section>
</template>
