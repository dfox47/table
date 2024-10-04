<script setup lang="ts">
import Desk from '@/components/Desk.vue'
import { onMounted } from 'vue'

onMounted(() => {
  document.title = 'Home | Order comfortable & simple desk for development, design, gaming. IT desk. Game desk.'
})
</script>

<template>
  <h1 class="h1">Clean desk</h1>

  <Desk />

  <h2 class="h2">Cart</h2>

  <div class="contacts">
    <div>Address</div>
    <div>Contact phone</div>
    <div>E-mail</div>
  </div>
</template>