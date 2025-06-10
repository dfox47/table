<template>
  <h2 id="gallery">{{ $t('header.gallery') }}</h2>

  <div class="gallery">
    <Carousel v-bind="carouselConfig" ref="myCarousel">
      <Slide v-for="image in galleryImages" :key="image.id" @click="onShow(image.id)">
        <div class="carousel__item cursor-pointer hover:opacity-80">
          <img :src="image.src" alt="">
        </div>
      </Slide>

      <template #addons>
        <Navigation />
      </template>
    </Carousel>

    <vue-easy-lightbox
      :visible="lightboxVisible"
      :imgs="galleryImages.map(i => i.src)"
      :move-disabled="true"
      :index="lightboxIndexRef"
      @hide="onHide"
      @on-prev="lightboxIndexRef--"
      @on-next="lightboxIndexRef++"
    >
      <template v-slot:toolbar="{}">
        <div>
          <div class="vel-toolbar flex items-center">
            <div
              role="button"
              class="toolbar-btn"
            >
              {{ lightboxIndexRef + 1 }} / {{ galleryImages.length }}
            </div>
          </div>
        </div>
      </template>
    </vue-easy-lightbox>
  </div>
</template>

<script lang="ts" setup>
import { ref } from 'vue'
import 'vue3-carousel/carousel.css'
import VueEasyLightbox from 'vue-easy-lightbox'
import { Carousel, Slide, Navigation } from 'vue3-carousel'

const galleryImages = ref(Array.from({ length: 20 }, (_, i) => ({
  id: i + 1,
  src: `/gallery/${i + 1}.jpg`,
  alt: `Gallery image ${i + 1}`
})))

const carouselConfig: any = ref({
  height: 300,
  itemsToShow: 1,
  gap: 24,
  // autoplay: 4000,
  pauseAutoplayOnHover: true,
  active: true,
  breakpoints: {
    320: {
      itemsToShow: 1,
      snapAlign: 'center',
    },
    768: {
      itemsToShow: 2,
      snapAlign: 'start',
    },
    1024: {
      itemsToShow: 3,
      snapAlign: 'start',
    },
  },
})

const lightboxVisible = ref(false)
const lightboxIndexRef = ref(0) // default 0
const onShow = (index: number) => {
  lightboxIndexRef.value = index - 1
  lightboxVisible.value = true
}
const onHide = () => {
  lightboxVisible.value = false
}
</script>

<style lang="scss">
@use '@/assets/css/_vars' as *;

.gallery {
  border: 1rem #fff solid;
  margin: 0 0 $space;
  width: 100%;
}

.carousel {
  --vc-nav-background: rgba(#fff, 0.7);
  --vc-nav-border-radius: 100%;

  &__item {
    padding: 2px;
  }

  &__next {
    margin: 0 10px;
  }

  &__prev {
    margin: 0 10px;
  }

  &__slide {
    cursor: pointer;
    position: relative;

    &::after {
      box-shadow: 0 2px 2px rgba(#000, 0.15);
      content: "";
      height: calc(100% - 4px);
      left: 2px;
      position: absolute;
      top: 2px;
      width: calc(100% - 4px);
      z-index: 3;
    }
  }
}

.vel-img {
  max-height: 100%;
  max-width: 100%;
}
</style>
