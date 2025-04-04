<template>
  <div class="hero">
    <div class="hero__content">
      <h1 class="h1">{{ $t('homepage.banner.title') }}</h1>

      <div class="subtitle">{{ $t('homepage.banner.description') }}</div>
    </div>
  </div>

  <DeskConstructor v-model="model" />

  <div class="text-center">
    <div class="flex justify-center gap-5">
      <button
        v-for="(tab, index) in tabs"
        :key="index"
        class="btn btn--main btn--s font-extralight"
        :class="{ 'active': activeTab === index }"
        @click="activeTab = index"
      >
        <span>{{ tab.label }}</span>
      </button>
    </div>

    <div v-if="activeTab === 0">
      <TableGallery />
    </div>
    <div v-if="activeTab === 1">
      <DeskDescription />
    </div>
    <div v-if="activeTab === 2">
      <SendForm :send-form-data="model" />
    </div>
  </div>
</template>

<script setup lang="ts">
import { onMounted, reactive, ref } from 'vue'
import TableGallery from '@/components/TableGallery.vue'
import { SendForm, DeskConstructor, DeskDescription } from '@/components/widgets'
import { useI18n } from 'vue-i18n'

import type { Product } from '@/types'
import { Position } from '@/types'

const { t } = useI18n()

const model = reactive<Product>({
  bottomColor: 'bg_0',
  mainColor: 'bg_1',
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

const activeTab = ref(0)

const tabs = [
  { label: t('header.gallery') },
  { label: t('technical.description') },
  { label: t('header.cart') }
]
</script>

<style lang="scss" scoped>
@use "@/assets/css/_vars" as *;

.hero {
  align-items: flex-end;
  background: url('@/assets/i/hero.png') no-repeat center scroll #000;
  background-size: cover;
  color: #fff;
  display: flex;
  justify-content: flex-start;
  overflow: hidden;
  position: relative;
  min-height: 80vh;
  text-shadow: 0 0 10px #000;

  &::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    z-index: 1;
    height: 100%;
    background: linear-gradient(to top, #000 0%, rgba(#000, 0.5) 30%, rgba(#000, 0) 100%);
    width: 100%;
  }

  h1 {
    text-align: left;
  }

  &__content {
    padding: $space;
    position: relative;
    z-index: 3;
  }
}

.subtitle {
  font-size: 3em;
  font-weight: 700;
  text-shadow: 0 0 3px #000;
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
