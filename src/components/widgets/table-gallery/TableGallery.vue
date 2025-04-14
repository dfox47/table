<template>
  <h2 id="gallery">
    {{ $t('header.gallery') }}
  
    <button @click="changeAutoplay">
      Autoplay {{ isAutoplay }}
    </button>
  </h2>

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
      :imgs="galleryImages"
      :index="lightboxIndexRef"
      @hide="onHide"
      @on-prev="lightboxIndexRef--"
      @on-next="lightboxIndexRef++"
    >
      <template v-slot:toolbar="{ toolbarMethods }">
        <div>
          <div class="vel-toolbar flex items-center">
            <div 
              role="button"
              class="toolbar-btn"
            >
              {{ lightboxIndexRef + 1 }} из {{ galleryImages.length }}
            </div>

            <div 
              role="button"
              class="toolbar-btn toolbar-btn__zoomin"
              @click="toolbarMethods.zoomIn"
              >
              <svg class="vel-icon icon" aria-hidden="true">
                <use xlink:href="#icon-zoomin"></use>
              </svg>
            </div>
            
            <div 
              role="button" 
              class="toolbar-btn toolbar-btn__zoomout"
              @click="toolbarMethods.zoomOut"
            >
              <svg class="vel-icon icon" aria-hidden="true">
                <use xlink:href="#icon-zoomout"></use>
              </svg>
            </div>
            
            <div 
              role="button" 
              class="toolbar-btn toolbar-btn__rotate"
              @click="toolbarMethods.rotateLeft"
            >
              <svg class="vel-icon icon" aria-hidden="true">
                <use xlink:href="#icon-rotate-left"></use>
              </svg>
            </div>
            
            <div 
              role="button"
              class="toolbar-btn toolbar-btn__rotate"
              @click="toolbarMethods.rotateRight"
              >
              <svg class="vel-icon icon" aria-hidden="true">
                <use xlink:href="#icon-rotate-right"></use>
              </svg>
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

const myCarousel = ref(null);

const galleryImages = ref(Array.from({ length: 20 }, (_, i) => ({
  id: i + 1,
  src: `/gallery/${i + 1}.jpg`,
  alt: `Gallery image ${i + 1}`
})))

const carouselConfig: any = ref({
  height: 300,
  itemsToShow: 1,
  gap: 24,
  autoplay: 4000,
  pauseAutoplayOnHover: true,
  active: true,
  breakpoints: {
    // 300px and up
    320: {
      itemsToShow: 1,
      snapAlign: 'center',
    },
    // 400px and up
    768: {
      itemsToShow: 2,
      snapAlign: 'start',
    },
    // 500px and up
    1024: {
      itemsToShow: 3,
      snapAlign: 'start',
    },
  },
})

const isAutoplay = ref(true)

const changeAutoplay = () => {
  isAutoplay.value = !isAutoplay.value
  carouselConfig.value.autoplay = isAutoplay.value ? 4000 : 0
}

const lightboxVisible = ref(false)
const lightboxIndexRef = ref(0) // default 0
const onShow = (index: number) => {
  lightboxIndexRef.value = index - 1
  lightboxVisible.value = true
}
const onHide = () => (() => {
  lightboxVisible.value = false
})
</script>

<style lang="scss">
@use '@/assets/css/_vars' as *;

.gallery {
  border: 1rem #fff solid;
  margin: 0 0 $space;
  width: 100%;
}

.carousel {
  --vc-nav-background: rgba(255, 255, 255, 0.7);
  --vc-nav-border-radius: 100%;
}

.carousel__next {
  margin: 0 0.5rem;
}

.carousel__prev {
  margin: 0 0.5rem;
}
</style>
