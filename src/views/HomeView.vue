<template>
  <div class="hero">
    <h1 class="h1">{{ $t('homepage.banner.title') }}</h1>

    <div class="subtitle">{{ $t('homepage.banner.description') }}</div>
  </div>

  <DeskConstructor v-model="model" />

  <TableGallery />

  <h2 id="cart" class="h2">Cart</h2>

  <SendForm :send-form-data="model" />
</template>

<script setup lang="ts">
import { onMounted, reactive } from 'vue'
import TableGallery from '@/components/TableGallery.vue'
import { SendForm, DeskConstructor } from '@/components/widgets'

import type { Product } from '@/types'
import { Position } from '@/types'

const model = reactive<Product>({
  bottomColor: "bg_0",
  mainColor: "bg_1",
  ventHoles: true,
  deskLegs: true,
  phoneHolder: Position.BOTH,
  tabletHolder: Position.BOTH,
  whiteboard: Position.BOTH,
})

onMounted(() => {
  document.title =
    'Simply the desk | Order comfortable & simple desk for development, design, gaming. IT desk. Game desk.'
})
</script>

<style lang="scss" scoped>
@use "@/assets/css/_vars" as *;

.h1 {
  text-shadow: 0 0 10px #fff;
}

.hero {
  align-items: center;
  background: url('@/assets/i/hero.png') no-repeat center scroll;
  background-size: cover;
  display: flex;
  flex-direction: column;
  justify-content: center;
  overflow: hidden;
  position: relative;
  min-height: 80vh;
}

.subtitle {
  font-size: 3em;
  font-weight: 700;
  opacity: 0.8;
  text-align: center;
  text-shadow: 0 0 3px #fff;
  text-transform: uppercase;

  @media #{$tablet} {
    font-size: 2.5em;
  }

  @media #{$mobile} {
    font-size: 2em;
  }

  @media #{$mobile_s} {
    font-size: 1.1em;
  }
}
</style>
