<template>
  <footer class="footer py-10 text-center">
    <div class="text-sm text-nowrap text-slate-400">
      <p class="mb-1">
        <a :href="`tel:${appConfig.phone.replace(/[\s()]/g, '')}`" title="phone" target="_blank">{{ appConfig.phone }}</a>
      </p>

      <p class="mb-5">
        <a :href="`mailto:${appConfig.email}`" target="_blank">{{ appConfig.email }}</a>
      </p>

      <LanguageSwitcher />

      <p class="my-5">
        <a href="//www.instagram.com/simplythedesk_net/" target="_blank"><img class="inline-block" src="@/assets/i/instagram.svg" alt=""></a>
      </p>
    </div>

    <div class="text-xs text-slate-400 uppercase text-nowrap mt-5">
      <div>Made in <a class="c_special" href="//maps.app.goo.gl/G79jQBCJBzRYv6Ys8" target="_blank">Bulgaria</a></div>

      <div>stay true</div>

      <div>© 2020 - {{ new Date().getFullYear() }}</div>
    </div>
  </footer>
</template>

<script setup lang="ts">
import { appConfig } from "@/config";

import LanguageSwitcher from './LanguageSwitcher.vue'
</script>

<style lang="scss" scoped>
@use '@/assets/css/_vars' as *;

.footer {
  background-color: $c_primary;
  margin: $space 0 0;
}
</style>
