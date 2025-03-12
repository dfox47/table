type TranslationKeys = 'cart' | 'gallery' | 'home' | 'technicalDescription' | 'slogan';

type Translations = Record<'bg' | 'en' | 'ru', Record<TranslationKeys, string>>;

export const translations: Translations = {
  bg: {
    cart: "Количка",
    gallery: "Галерия",
    home: "Начало",
    technicalDescription: "Техническо описание",
    slogan: "Работа. Научете. Играйте",
  },
  en: {
    cart: "Cart",
    gallery: "Gallery",
    home: "Home",
    technicalDescription: "Technical description",
    slogan: "Work. Learn. Play",
  },
  ru: {
    cart: "Корзина",
    gallery: "Галерия",
    home: "Главная",
    technicalDescription: "Техническоe описание",
    slogan: "Работай. Учись. Играй.",
  },
};
