import { createI18n } from 'vue-i18n';
import bg from '@/locales/bg.json';
import en from '@/locales/en.json';
import ru from '@/locales/ru.json';

const i18n = createI18n({
  legacy: false, // Используем Composition API
  locale: 'en', // Язык по умолчанию
  fallbackLocale: 'en', // Резервный язык
  globalInjection: true, // Позволяет использовать $t в шаблонах
  messages: {
    bg,
    en,
    ru,
  },
});

export { i18n };