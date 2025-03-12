<template>
  <header class="header flex items-center p-5 shadow-slate-50">
    <div class="max-w-36 w-full">
      <a class="block" href="/">
        <img class="h-10 w-10" src="@/assets/i/logo.svg" alt="">
      </a>
    </div>

    <nav v-if="menuItems" class="font-bold w-full">
      <ul class="flex font-extralight justify-center text-nowrap uppercase">
        <li v-for="item in menuItems" :key="item.title">
          <a
            class="block hover:bg-sky-700 hover:text-white py-3 px-5 transition-all"
            :href="item.href"
            @click="scrollToSection(item.href.replace('/#', ''), $event)"
          >
            <span class="">{{ item.title }}</span>
          </a>
        </li>
      </ul>
    </nav>

    <p class="w-full max-w-36 text-sm text-right">
      <a class="block text-nowrap" :href="`tel:${appConfig.phone.replace(/[\s()]/g, '')}`" title="phone" target="_blank">{{ appConfig.phone }}</a>
      <a class="block text-nowrap" :href="`tel:${appConfig.phone.replace(/[\s()]/g, '')}`" title="phone" target="_blank">{{ appConfig.phone }}</a>
    </p>

    <LanguageSwitcher @changeLanguage="handleLanguageChange" />
  </header>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue'
import { appConfig } from '@/config'
import { translations } from '@/translations'
import LanguageSwitcher from '@/components/LanguageSwitcher.vue'

const currentLang = ref<keyof typeof translations>('en')

const menuItems = computed(() => [
  { title: translations[currentLang.value]?.home, href: '/#top' },
  {
    title: translations[currentLang.value]?.technicalDescription,
    href: '/#technical-description',
  },
  { title: translations[currentLang.value]?.gallery, href: '/#gallery' },
  { title: translations[currentLang.value]?.cart, href: '/#cart' },
]);

const handleLanguageChange = (lang: string) => {
  currentLang.value = lang;
};

const emit = defineEmits(['scrollTo']);

const scrollToSection = (id: string, event: Event) => {
  event.preventDefault()
  emit("scrollTo", id)
}
</script>

<style lang="scss" scoped>
@use '@/assets/css/_vars' as *;

.header {
  box-shadow: 0 0 10px rgba(#000, 0.3);
  padding: calc($space / 2);
}
</style>