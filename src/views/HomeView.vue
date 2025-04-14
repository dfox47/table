<template>
  <div class="hero">
    <div class="hero__content">
      <h1 class="h1">{{ $t('homepage.banner.title') }}</h1>

      <div class="hero__subtitle font-bold mb-5 uppercase">{{ $t('homepage.banner.description') }}</div>

      <button class="btn btn--main btn--border" @click="scrollToSection('desk-desciption-title', $event)">
        <span>{{ $t('table.description.title') }}</span>
      </button>
    </div>
  </div>

  <DeskConstructor v-model="model" />

  <div id="tabs" class="flex flex-col flex-wrap justify-center gap-5 px-2 py-10 sm:flex-row">
    <button
      v-for="(tab, index) in tabs"
      :key="index"
      class="btn btn--main btn--s"
      :class="{ 'active': tabStore.activeTab === index }"
      @click="tabStore.setTab(index)"
    >
      <span>{{ $t(tab.label) }}</span>
    </button>
  </div>

  <div v-if="tabStore.activeTab === 0">
    <TableGallery />
  </div>
  <div v-if="tabStore.activeTab === 1">
    <DeskDescription />
  </div>
  <div v-if="tabStore.activeTab === 2">
    <DeskWhy />
  </div>
  <div v-if="tabStore.activeTab === 3">
    <SendForm :send-form-data="model" />
  </div>
</template>

<script setup lang="ts">
import { reactive } from 'vue'
import { DeskConstructor, DeskDescription, DeskWhy, SendForm, TableGallery } from '@/components/widgets'
import type { Product } from '@/types'
import { Position } from '@/types'
import { useTabStore } from '@/stores/useTabStore'

const emit = defineEmits(['scrollTo'])

const scrollToSection = (id: string, event: Event) => {
  event.preventDefault()
  emit('scrollTo', id)
}

const model = reactive<Product>({
  bottomColor: 'bg_0',
  mainColor: 'bg_1',
  ventHoles: true,
  deskLegs: true,
  phoneHolder: Position.BOTH,
  tabletHolder: Position.BOTH,
  whiteboard: Position.BOTH,
})

const tabStore = useTabStore()

const tabs = [
  { label: 'header.gallery' },
  { label: 'technical.description' },
  { label: 'header.why' },
  { label: 'header.cart' }
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

    @media #{$tablet} {
      padding: calc($space / 2);
    }
  }

  &__subtitle {
    font-size: 3em;
    text-shadow: 0 0 3px #000;

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
}
</style>
