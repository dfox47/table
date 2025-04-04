<template>
  <header class="flex items-center py-2 px-5 shadow-slate-50">
    <div class="max-w-36 w-full">
      <a class="block h-10 w-10" href="/">
        <img class="h-10 w-10" src="@/assets/i/logo.svg" alt="">
      </a>
    </div>

    <nav v-if="menuItems.length" class="font-bold w-full">
      <ul class="flex font-extralight justify-center text-nowrap uppercase">
        <li v-for="(item, index) in menuItems" :key="item.title">
          <a
            class="block hover:bg-sky-700 hover:text-white py-3 px-5 transition-all"
            :href="item.href"
            @click="scrollToSection(item.href.replace('/#', ''), $event); switchTab(index)"
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

const scrollToSection = (id: string, event: Event) => {
  event.preventDefault()
  emit('scrollTo', id)
}

const tabStore = useTabStore()

const switchTab = (index: number) => {
  tabStore.setTab(index)
}
</script>
