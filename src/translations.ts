type TranslationKeys = 'cart' | 'gallery' | 'home' | 'technicalDescription' | 'slogan';

type Translations = Record<'bg' | 'en' | 'ru', Record<TranslationKeys, string>>;

export const translations: Translations = {
  bg: {
    cart: "Количка",
    gallery: "Галерия",
    home: "Начало",
    technicalDescription: "Описание",
    slogan: "Работа. Научете. Играйте",
  },
  en: {
    cart: "Cart",
    gallery: "Gallery",
    home: "Home",
    technicalDescription: "Description",
    slogan: "Work. Learn. Play",
  },
  ru: {
    cart: "Корзина",
    gallery: "Галерия",
    home: "Главная",
    technicalDescription: "Описание",
    slogan: "Работай. Учись. Играй.",
  },
};
