<script setup lang="ts">
const menuItems = [
  {title: 'Home', href: '/#top'},
  {title: 'About', href: '/#about'},
  {title: 'Projects', href: '/#projects'},
  {title: 'Contacts', href: '/#contacts'},
]
</script>

<template>
  <header class='flex items-center'>
    <img class="w-10 h-10" src="@/assets/logo.svg" alt="">

    <nav v-if='menuItems' class='w-full'>
      <ul class="flex nav justify-center">
        <li v-for='item in menuItems' :key='item.title' class="nav__item uppercase ease-in-out transition-all">
          <a class='nav__link px-5 py-2 block ' :href="item.href">{{ item.title }}</a>
        </li>
      </ul>
    </nav>

    <div>
      <a class='block text-nowrap' href='tel:+359882744430' title='phone' target='_blank'>+359 (88) 27-444-30</a>
    </div>
  </header>
</template>

<style lang='scss' scoped>
@import '@/assets/css/_styles.scss';

.nav {
  &__item {
    &:hover {
      background-color: $c_main;
      color: #fff;
    }
  }

  &__link {}
}
</style>