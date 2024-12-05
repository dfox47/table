<template>
  <h2>Gallery</h2>

  <swiper
    :modules="modules"
    :pagination="{ clickable: true }"
    :slides-per-view="1"
    :space-between="0"
    :autoplay="{ delay: 2500, disableOnInteraction: false }"
    @slideChange="onSlideChange"
    @swiper="onSwiper"
    class="gallery"
    navigation
    loop
  >
    <swiper-slide v-for="item in 84" class="gallery__item">
      <img class="gallery__img" :src="'/gallery/' + item + '.jpg'" alt="">
    </swiper-slide>
  </swiper>
</template>

<script lang="ts" setup>
import { Swiper, SwiperSlide } from 'swiper/vue'
import { Autoplay, Navigation } from 'swiper/modules'

import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'

const onSwiper = (swiper: any) => {
  console.log(swiper)
}

const onSlideChange = () => {
  console.log('slide change')
}

const modules = [Autoplay, Navigation]
</script>

<style lang="scss" scoped>
@use '@/assets/css/_vars' as *;

.gallery {
  margin: 0 auto 5rem;
  max-width: 500px;
  width: 100%;

  &__img {
    display: block;
    object-fit: contain;
  }

  &__item {
    display: flex;
    align-items: center;
    height: 500px;
  }
}

.swiper-button-prev {
  background-color: #f00;
  cursor: pointer;
  display: block;
  height: 30px;
  left: auto;
  position: absolute;
  right: 100%;
  width: 30px;
}

.swiper-button-next {}
</style>
