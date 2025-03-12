<template>
  <div class="lang_switcher">
    <div class="lang_switcher__current">{{ currentLanguage }}</div>

    <div class="lang_switcher_list">
      <button
        v-for="lang in filteredLanguages"
        :key="lang.code"
        class="lang_switcher_list__item"
        @click="changeLanguage(lang.code)"
        :title="lang.title"
      >
        {{ lang.code }}
      </button>
    </div>
  </div>
</template>

<script setup lang="ts">
import { defineEmits, computed, ref } from 'vue'

const emit = defineEmits<{
  (e: 'changeLanguage', lang: string): void
}>()

const currentLanguage = ref('en');

const changeLanguage = (lang: string) => {
  currentLanguage.value = lang;
  emit('changeLanguage', lang)
}

const languages = [
  { code: 'en', title: 'English' },
  { code: 'bg', title: 'Български' },
  { code: 'ru', title: 'Русский' }
]

const filteredLanguages = computed(() => {
  return languages.filter(lang => lang.code !== currentLanguage.value);
})
</script>

<style lang="scss" scoped>
@use '@/assets/css/_vars' as *;

.lang_switcher {
  cursor: pointer;
  margin: 0 0 0 1em;
  position: relative;

  &:hover {
    .lang_switcher_list {
      display: flex;
    }
  }

  &__current {
    background-color: #000;
    color: #fff;
    padding: 1em;
  }
}

.lang_switcher_list {
  display: none;
  flex-direction: column;
  position: absolute;
  width: 100%;

  &__item {
    border-left: 1px solid #000;
    border-right: 1px solid #000;
    border-bottom: 1px solid #000;
    padding: 1em;
    transition: $transition;

    &:hover {
      background-color: #000;
      color: #fff;
    }
  }
}
</style>