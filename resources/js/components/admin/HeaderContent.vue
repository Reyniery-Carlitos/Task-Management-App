<script setup>

import imagePath from "../../consts/imagePath.js";
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import {Inertia} from '@inertiajs/inertia'

</script>

<template>
  <header class="flex flex-col gap-2 shadow-sm h-1/6 pt-2">
    <div class="flex justify-between py-1 px-7 items-center">
      <button
      @click="Inertia.visit(route('dashboards.crear'))"
        class="flex items-center h-8 bg-indigo-600/90 text-white font-bold text-sm w-20 rounded-md text-center content-center p-1 gap-1 min-w-24">
        <!-- <span class="bg-gray-100 rounded-full h-6 w-6 text-center content-center"> + </span> -->
        <img src="../icons/Plus_icon-icons.com_71848.svg" alt="Plus icon"
          class="h-6 w-6 content-center rounded-full bg-gray-100" />
        <span class=""> Create </span>
      </button>

      <input type="text" placholder="Search" class="min-w-96 p-1 outline-none border border-gray-200/50 rounded-lg"
        placeholder="Search" />

      <div class="ms-3 relative">
        <div class="flex items-center">
          <img :src="imagePath + $page.props.auth.user.avatar" alt="Profile photo" class="h-8 w-8 rounded-full">
          <Dropdown align="right" width="48">
            <template #trigger>
              <span class="inline-flex rounded-md">
                <button type="button"
                  class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                  {{ $page.props.auth.user.name }}
                  <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd" />
                  </svg>
                </button>
              </span>
            </template>

            <template #content>
              <DropdownLink :href="route('profile.edit')">
                Profile
              </DropdownLink>
              <DropdownLink :href="route('logout')" method="post" as="button">
                Log Out
              </DropdownLink>
            </template>
          </Dropdown>
        </div>
      </div>
    </div>

    <div class="flex w-full px-7 pt-1">
      <nav class="w-4/5">
        <ul class="flex gap-1 text-sm">
          <li class="min-w-20 h-6 content-center text-center text-slate-800/90">
            <a href="" class="hover:bg-transparent"> Item 1 </a>
          </li>
          <li class="min-w-20 h-6 content-center text-center text-slate-800/90">
            <a href="" class="hover:bg-transparent"> Item 2 </a>
          </li>
          <li class="min-w-20 h-6 content-center text-center text-slate-800/90">
            <a href="" class="hover:bg-transparent"> Item 3 </a>
          </li>
          <li class="min-w-20 h-6 content-center text-center text-slate-800/90">
            <a href="" class="hover:bg-transparent"> Item 4 </a>
          </li>
        </ul>
      </nav>

      <!-- <div class="flex w-1/5 items-center justify-end">
                <ul class="flex items-center">
                    <template
                        v-if="usersInDashboard && usersInDashboard.length > 3"
                    >
                        <li
                            v-for="user in 2"
                            :key="usersInDashboard.users[user].id"
                        >
                            <img
                                :src="
                                    imagePath +
                                    usersInDashboard.users[user].avatar
                                "
                                class="h-6 w-6 bg-gray-100 rounded-full"
                            />
                        </li>

                        <li
                            class="h-6 w-6 bg-gray-100 content-center text-center text-xs rounded-full -translate-x-6 font-medium"
                        >
                            <span>{{ usersInDashboard.users.length - 3 }}</span>
                        </li>
                    </template>
                    <template v-if="usersInDashboard">
                        <li
                            v-for="user in usersInDashboard.users"
                            :key="user.id"
                        >
                            <img
                                :src="imagePath + user.avatar"
                                class="h-6 w-6 bg-gray-100 rounded-full -translate-x-2"
                            />
                        </li>
                    </template>
                </ul>

                <button
                    class="bg-gray-100 rounded-full h-6 w-6 text-center content-center"
                >
                    <img src="../icons/plus_icon.svg" alt="Plus icon" />
                </button>
            </div> -->
    </div>
  </header>
</template>
