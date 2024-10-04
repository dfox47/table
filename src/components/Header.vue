<script setup lang="ts">
const menuItems = [
  {title: 'Home', href: '/#top'},
  {title: 'About', href: '/#about'},
  {title: 'Projects', href: '/#projects'},
  {title: 'Contacts', href: '/#contacts'},
]
</script>

<template>
  <header class="flex items-center">
    <img class="w-10 h-10" src="@/assets/logo.svg" alt="">

    <nav v-if="menuItems" class="font-bold w-full">
      <ul class="flex justify-center">
        <li v-for="item in menuItems" :key="item.title" class="rounded-lg uppercase ease-in-out transition-all">
          <a class="relative inline-flex items-center justify-center p-0.5 my-2 me-2 overflow-hidden text-sm text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800" :href="item.href"><span class="font-medium relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">{{ item.title }}</span></a>
        </li>
      </ul>
    </nav>

    <p>
      <a class="block text-nowrap" href="tel:+359882744430" title="phone" target="_blank">+359 (88) 27-444-30</a>
    </p>
  </header>
</template>