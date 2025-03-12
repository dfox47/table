<script setup lang="ts">
import { RouterView } from 'vue-router'
import Footer from './components/Footer.vue'
import Header from './components/Header.vue'

const scrollTo = (id: string) => {
  const element = document.getElementById(id)

  if (element) {
    element.scrollIntoView({ behavior: "smooth" })
  }
}
</script>

<template>
  <Header @scrollTo="scrollTo" />

  <RouterView />

  <Footer />
</template>
