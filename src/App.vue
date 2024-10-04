<script setup lang="ts">
import { RouterView } from 'vue-router'
import Footer from './components/Footer.vue'
import Header from './components/Header.vue'
</script>

<template>
  <div class="p-5">
    <Header />

    <RouterView />

    <Footer />
  </div>
</template>

<style lang="scss" scoped>
</style>