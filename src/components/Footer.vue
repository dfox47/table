<template>
  <footer class="footer py-10 text-center">
    <div class="text-sm text-nowrap text-slate-400">
      <p class="mb-1">
        <a :href="`tel:${appConfig.phone.replace(/[\s()]/g, '')}`" title="phone" target="_blank">{{ appConfig.phone }}</a>
      </p>

      <p>
        <a :href="`mailto:${appConfig.email}`" target="_blank">{{ appConfig.email }}</a>
      </p>

      <p class="my-5">
        <a href="//www.instagram.com/simplythedesk_net/" target="_blank"><img class="inline-block" src="@/assets/i/instagram.svg" alt=""></a>
      </p>
    </div>

    <div class="text-xs text-slate-400 uppercase text-nowrap mt-5">
      <div><a class="footer__map_link" href="//maps.app.goo.gl/PYsvjZMqVFr4qjtv6" target="_blank">Bansko</a>, Bulgaria</div>

      <div>stay true</div>

      <div>© 2020 - {{ new Date().getFullYear() }}</div>
    </div>
  </footer>
</template>

<script setup lang="ts">
import { appConfig } from "@/config";
</script>

<style lang="scss" scoped>
@use '@/assets/css/_vars' as *;

.footer {
  background-color: $c_primary;
  margin: $space 0 0;

  &__map_link {
    color: $c_special;
  }
}
</style>
