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
  const titleKey = to.meta?.titleKey as string | undefined
  if (titleKey) {
    document.title = i18n.global.t(titleKey)
  }
})

app
  .use(createPinia())
  .use(router)
  .use(ElementPlus)
  .use(i18n)

app.mount('#app')