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
import { useLanguageSwitcher } from '@/composables/useLanguageSwitcher'
const { languages, currentLanguage, changeLanguage } = useLanguageSwitcher()
</script>

<style scoped>
.lang-switch {
  min-width: 60px;
  width: 60px;
}
</style>