<script setup>
import { ref } from 'vue'
// import { useStore } from 'vuex';
import {Link} from '@inertiajs/vue3';
const email = ref('')
const password = ref('')
// const store = useStore()

// const login = () => {
//   store.dispatch('login', {email: email.value, password: password.value})

//   if (store.state.isLoggedIn) {
//     router.push('/admin')
//   }
// }
</script>

<template>
  <form
    class="flex flex-col items-center w-96 p-10 mt-10 gap-5 shadow-xl shadow-slate-200/40"
    @submit.prevent="login"
  >
    <h1 class="text-bold text-4xl font-sans">Login</h1>
    <div class="flex flex-col w-full m-0 gap-3">
      <label for="email" class="text-sm"> Email </label>
      <input
        type="text"
        name="email"
        class="w-full h-10 p-2 bg-indigo-50/30 outline-none"
        v-model="email"
      />

      <label for="password" class="text-sm"> Password </label>
      <input
        type="password"
        name="password"
        class="w-full h-10 p-2 bg-indigo-50/30 outline-none"
        v-model="password"
      />
    </div>

    <span class="my-1 self-end text-sm cursor-pointer"> Forgot password </span>

    <button type="submit" class="w-full bg-blue-500 text-white p-1 font-bold">Login</button>
  </form>
</template>
