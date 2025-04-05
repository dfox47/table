import { createApp } from 'vue'
import { createPinia } from 'pinia'
import i18n from './plugins/i18n'
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'
import './assets/css/_styles.scss'

import App from './App.vue'
import router from './router'

const app = createApp(App)

router.afterEach((to) => {
  if (to.meta?.titleKey) {
    document.title = i18n.global.t(to.meta.titleKey)
  }
})

app
  .use(createPinia())
  .use(router)
  .use(ElementPlus)
  .use(i18n)

app.mount('#app')

watch(() => i18n.global.locale.value, () => {
  const route = router.currentRoute.value
  if (route.meta?.titleKey) {
    document.title = i18n.global.t(route.meta.titleKey)
  }
})