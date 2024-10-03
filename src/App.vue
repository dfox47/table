<script setup lang="ts">
import { RouterView } from 'vue-router'
import Footer from './components/Footer.vue'
import Header from './components/Header.vue'
</script>

<template>
  <div class='p-5'>
    <Header />

    <RouterView />

    <div>Color</div>

    <div>Size</div>

    <div>Technical description</div>

    <table>
      <tr>
        <td>Weight</td>
        <td>50 Kg</td>
      </tr>
    </table>

    <Footer />
  </div>
</template>

<style lang='scss' scoped>
</style>