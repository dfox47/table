// stores/useTabStore.js
import { defineStore } from 'pinia'

export const useTabStore = defineStore('tab', {
  state: () => ({
    activeTab: 0
  }),
  actions: {
    setTab(index: number) {
      this.activeTab = index
    }
  }
})
