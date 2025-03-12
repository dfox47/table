<template>
  <h2 id="gallery">Gallery</h2>

  <div class="gallery">
    <div v-for="item in 20" class="gallery__item" :key="item">
      <img class="gallery__img" :src="'/gallery/' + item + '.jpg'" alt="">
    </div>
  </div>
</template>

<script lang="ts" setup></script>

<style lang="scss" scoped>
@use '@/assets/css/_vars' as *;

.gallery {
  border: 1rem #fff solid;
  display: grid;
  grid-gap: 1rem;
  grid-template-columns: repeat(5, 1fr);
  margin: 0 0 $space;
  width: 100%;

  @media #{$tablet} {
    grid-template-columns: repeat(4, 1fr);
  }

  @media #{$mobile} {
    grid-template-columns: repeat(2, 1fr);
  }

  &__img {
    display: block;
    height: 100%;
    max-width: none;
    object-fit: cover;
    position: absolute;
    width: 100%;
  }

  &__item {
    align-items: center;
    display: flex;
    position: relative;
    width: 100%;

    &::after {
      content: "";
      display: block;
      padding: 70% 0 0;
      width: 100%;
    }
  }
}
</style>
