import { ref, onMounted, watch } from 'vue'
import { useI18n } from 'vue-i18n'

const currentLanguage = ref()

export const useLanguageSwitcher = () => {
  const { locale } = useI18n()

	const languages = [
		{ code: 'en', label: 'EN' },
		{ code: 'bg', label: 'BG' },
		{ code: 'ru', label: 'RU' }
	]

	const changeLanguage = (lang: string) => {
		locale.value = lang
		localStorage.setItem('lang', lang)
	}

	onMounted(() => {
		const savedLanguage = localStorage.getItem('lang')
		if (savedLanguage) {
			locale.value = savedLanguage
			currentLanguage.value = savedLanguage
		} else {
      currentLanguage.value = locale.value
    }
	})

	watch(locale, (newLang) => {
		document.documentElement.setAttribute('lang', newLang)
		document.body.className = `lang--${newLang}`
	}, { immediate: true })

	return {
		languages,
		currentLanguage,
		changeLanguage
	}
}