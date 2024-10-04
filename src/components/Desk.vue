<script setup lang="ts">
</script>

<template>
  <h2 class="h2">Constructor</h2>

  <div class="desk_preview border border-gray-400 rounded">
    <div class="desk_item desk_item--phone_holder border border-gray-700 rounded active"></div>
    <div class="desk_item desk_item--tablet_holder border border-gray-700 rounded active"></div>
    <div class="desk_item desk_item--whiteboard border border-gray-700 rounded active"></div>

    <div class="desk_holes">
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
      <span class="desk_holes__item"></span>
    </div>

    <div class="desk_logo"></div>
  </div>

  <ul class="desk_options">
    <li>
      <label class="checkbox cursor-pointer">
        <input type="checkbox" name="desk_white_board">
        <span class="checkbox__icon"></span>
        <span class="checkbox__title">Whiteboard</span>
      </label>
    </li>

    <li>
      <label class="checkbox cursor-pointer">
        <input type="checkbox" name="desk_phone_holder">
        <span class="checkbox__icon"></span>
        <span class="checkbox__title">Phone holder</span>
      </label>
    </li>

    <li>
      <label class="checkbox cursor-pointer">
        <input type="checkbox" name="desk_tablet_holder">
        <span class="checkbox__icon"></span>
        <span class="checkbox__title">Tablet holder</span>
      </label>
    </li>
  </ul>
</template>

<style lang="scss" scoped>
// 390x270 mm | 10mm = 0.26 x 0.37
.desk_holes {
  align-items: center;
  display: flex;
  flex-wrap: wrap;
  gap: calc(2.5% * 3);
  height: calc(1.67% * 27);
  justify-content: center;
  left: 50%;
  position: absolute;
  top: 10%;
  transform: translateX(-50%);
  width: calc(.83% * 39);

  &__item {
    border-radius: 50%;
    border: 1px solid #000;
    height: calc(3.7% * 3);
    width: calc(2.6% * 3);
  }
}

// 1200x600 mm | 10mm = 0.83 x 1.67
.desk_item {
  display: none;
  position: absolute;
  z-index: 1;

  &.active {
    display: block;
  }

  // 12x100 mm
  &--phone_holder {
    height: 1.67%;
    right: calc(.83% * 26);
    top: calc(1.67% * 3.5);
    transform: rotate(30deg);
    width: 7%;
  }

  // 12x200 mm
  &--tablet_holder {
    height: 1.67%;
    right: calc(.83%);
    top: calc(1.67% * 8);
    transform: rotate(30deg);
    width: 21%;
  }

  // 210x297
  &--whiteboard {
    bottom: calc(1.67% * 1.5);
    height: 49.5%;
    left: calc(.83% * 1.5);
    width: 17.5%;
  }
}

.desk_logo {
  position: absolute;
}

.desk_preview {
  background-color: #fff;
  //border: 1px solid;
  //border-radius: 10px;
  margin: 0 auto;
  max-width: 500px;
  position: relative;
  width: 100%;

  &::after {
    content: "";
    display: block;
    padding: 50% 0 0;
    position: relative;
  }
}
</style>