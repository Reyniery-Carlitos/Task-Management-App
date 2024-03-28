<script setup>
import { Inertia } from "@inertiajs/inertia";


function redirectToDashboards () {
  Inertia.visit(route('dashboards.owner.list'))
}

</script>


<template>
  <div class="flex flex-col gap-4 col-span-1 min-h-full p-5 shadow-md shadow-indigo-100">
    <header class="py-3">
      <h1 class="text-2xl font-bold">Logo</h1>
    </header>
    <main>
      <ul class="text-sm font-medium text-gray-900/95">
        <li
          class="flex h-10 w-11/12 pl-3 content-center mt-1 rounded-lg hover:bg-slate-200/50 items-center gap-2"
          @click="redirectToDashboards"
        >
          <img src="../icons/four_squares.svg" class="h-6 w-6" alt="Dashboard icon" />
          <span>Dashboard</span>
        </li>
      </ul>
    </main>
  </div>
</template>
