<template>
  <header class="flex items-center py-2 px-5 shadow-slate-50">
    <div class="max-w-36 w-full">
      <a class="block h-10 w-10" href="/">
        <img class="h-10 w-10" src="@/assets/i/logo.svg" alt="">
      </a>
    </div>

    <nav v-if="menuItems.length" class="w-full hidden lg:block">
      <ul class="flex justify-center gap-5">
        <li v-for="(item, index) in menuItems" :key="item.title">
          <a
            class="btn btn--secondary btn--s"
            :href="item.href"
            @click.prevent="scrollToSection(item.href.replace('/#', '')); switchTab(index)"
          >
            <span class="">{{ $t(item.title) }}</span>
          </a>
        </li>
      </ul>
    </nav>

    <p class="pr-10 w-full max-w-36 text-sm text-right">
      <a class="block text-nowrap" :href="`tel:${appConfig.phone.replace(/[\s()]/g, '')}`" title="phone" target="_blank">{{ appConfig.phone }}</a>
    </p>

    <LanguageSwitcher />

    <div @click="toggleBurger" class="ml-auto lg:hidden focus:outline-none">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </div>

    <ul class="flex flex-col justify-center gap-5 fixed top-0 left-0 w-full h-screen bg-white z-50 lg:hidden" v-if="isOpenMenu">
      <li v-for="(item, index) in menuItems" :key="item.title">
        <a
          class="btn btn--secondary btn--s"
          :href="item.href"
          @click.prevent="scrollToSection(item.href.replace('/#', '')); switchTab(index)"
        >
          <span class="">{{ $t(item.title) }}</span>
        </a>
      </li>
    </ul>

    <svg @click="toggleBurger" v-if="isOpenMenu" class="w-6 h-6 fixed top-6 right-6 z-50" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
    </svg>
  </header>
</template>

<script setup lang='ts'>
import { appConfig } from '@/config'
import { ref } from 'vue'
import { useTabStore } from '@/stores/useTabStore'
import LanguageSwitcher from './LanguageSwitcher.vue'

const menuItems = ref([
  {
    title: 'header.gallery',
    href: '/#tabs'
  },
  {
    title: 'header.technicalDescription',
    href: '/#tabs',
  },
  {
    title: 'header.why',
    href: '/#tabs'
  },
  {
    title: 'header.cart',
    href: '/#tabs'
  },
])

const emit = defineEmits(['scrollTo'])

const scrollToSection = (id: string) => {
  isOpenMenu.value = false
  emit('scrollTo', id)
}

const tabStore = useTabStore()

const switchTab = (index: number) => {
  tabStore.setTab(index)
}


// Burger menu
const isOpenMenu = ref(false)

const toggleBurger = () => {
  isOpenMenu.value = !isOpenMenu.value
}
</script>
