<template>
  <div class="hero">
    <h1 class="h1">{{ $t('homepage.banner.title') }}</h1>

    <div class="subtitle">{{ $t('homepage.banner.description') }}</div>
  </div>

  <DeskConstructor v-model="model" />

  <TableGallery />

  <h2 id="cart" class="h2">Cart</h2>

  <div class="contacts">
    <SendForm :additional-data="model" />
  </div>
</template>

<script setup lang="ts">
import { onMounted, reactive } from 'vue'
import TableGallery from '@/components/TableGallery.vue'
import DeskConstructor from '@/components/desk/DeskConstructor.vue'
import { SendForm } from '@/components/widgets/send-form'

import type { Product } from '../types'

const model = reactive<Product>({
  bottomColor: 'bg_3',
  mainColor: 'bg_1',
  phoneHolder: {
    position: 'both',
    price: 20,
    value: true
  },
  tabletHolder: {
    position: 'both',
    price: 20,
    value: true
  },
  ventHoles: {
    position: 'left',
    price: 20,
    value: true
  },
  whiteboard: {
    position: 'both',
    price: 20,
    value: true
  }
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
