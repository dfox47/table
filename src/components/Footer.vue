<script setup lang="ts">
</script>

<template>
  <footer class="footer py-10 text-center">
    <div class="text-sm text-nowrap text-slate-400">
      <p class="mb-1">
        <a href="tel:+359882744430" title="phone" target="_blank">+359 (88) 27-444-30</a>
      </p>

      <p>
        <a href="mailto:info@foxartbox.com" target="_blank">info@foxartbox.com</a>
      </p>
    </div>

    <div class="text-xs text-slate-400 uppercase text-nowrap mt-5">
      <div>stay true</div>

      <div>© 2020 - {{ new Date().getFullYear() }}</div>
    </div>
  </footer>
</template>

<style lang="scss" scoped>
@use '@/assets/css/_vars' as *;

.footer {
  background-color: $c_primary;
  margin: $space 0 0;
}
</style>
