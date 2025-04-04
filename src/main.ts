import { createApp } from 'vue'
import { createPinia } from 'pinia'
import i18n from './plugins/i18n'
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'
import './assets/css/_styles.scss'

import App from './App.vue'
import router from './router'

const app = createApp(App)

app
  .use(createPinia())
  .use(router)
  .use(ElementPlus)
  .use(i18n)

app.mount('#app')