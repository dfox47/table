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
    <div class="w-full max-w-36">
      <a class="block" href="/">
        <img class="w-10 h-10" src="@/assets/i/logo.svg" alt="">
      </a>
    </div>

    <nav v-if="menuItems" class="font-bold w-full">
      <ul class="flex justify-center uppercase font-extralight">
        <li v-for="item in menuItems" :key="item.title">
          <a class="py-2 px-2 block" :href="item.href">
            <span class="">{{ item.title }}</span>
          </a>
        </li>
      </ul>
    </nav>

    <p class="w-full max-w-36 text-sm text-right">
      <a class="block text-nowrap" href="tel:+359882744430" title="phone" target="_blank">+359 (88) 27-444-30</a>
    </p>
  </header>
</template>