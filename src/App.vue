<script setup lang="ts">
import { RouterView } from 'vue-router'
import SiteFooter from './components/SiteFooter.vue'
import SiteHeader from './components/SiteHeader.vue'

const scrollTo = (id: string) => {
  const element = document.getElementById(id)

  if (element) {
    element.scrollIntoView({ behavior: 'smooth' })
  }
}
</script>

<template>
  <SiteHeader @scrollTo="scrollTo" />

  <RouterView @scrollTo="scrollTo" />

  <SiteFooter />
</template>
