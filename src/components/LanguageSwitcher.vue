<template>
  <el-select
    v-model="currentLanguage"
    @change="changeLanguage"
    placeholder="Select Language"
    size="small"
    class="lang-switch"
  >
    <el-option
      v-for="lang in languages"
      :key="lang.code"
      :label="lang.label"
      :value="lang.code">
    </el-option>
  </el-select>
</template>

<script setup lang="ts">
import { onMounted, ref, watch } from 'vue'
import { useI18n } from 'vue-i18n'

const { locale } = useI18n()

const languages = [
  { code: 'en', label: 'EN' },
  { code: 'bg', label: 'BG' },
  { code: 'ru', label: 'RU' }
]

const currentLanguage = ref(locale.value)

const changeLanguage = (lang: string) => {
  locale.value = lang
  localStorage.setItem('lang', lang)
}

onMounted(() => {
  const savedLanguage = localStorage.getItem('lang')

  if (savedLanguage) {
    locale.value = savedLanguage
    currentLanguage.value = savedLanguage
  }
})

watch(locale, (newLang) => {
  document.documentElement.setAttribute('lang', newLang)
  document.body.className = `lang--${newLang}`
}, { immediate: true })
</script>

<style scoped>
.lang-switch {
  min-width: 60px;
  width: 60px;
}
</style>