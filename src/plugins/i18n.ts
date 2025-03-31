import { createI18n } from 'vue-i18n'
import bg from '@/locales/bg.json'
import en from '@/locales/en.json'
import ru from '@/locales/ru.json'

const messages = {
  bg,
  en,
  ru
};

const i18n = createI18n({
  locale: 'en',
  messages,
})

export default i18n