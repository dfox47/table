<script setup lang="ts">
</script>

<template>
  <h2 class="text-center uppercase font-medium tracking-widest text-2xl mb-5">Constructor</h2>

  <div class="desk_preview border border-gray-400 rounded">
    <div class="desk_item desk_item--phone_holder border border-gray-700 rounded active"></div>
    <div class="desk_item desk_item--tablet_holder border border-gray-700 rounded active"></div>
    <div class="desk_item desk_item--whiteboard border border-gray-700 rounded active"></div>

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
// 1200x600 | 10cm = 0.83 x 1.67
.desk_item {
  display: none;
  position: absolute;
  z-index: 1;

  &.active {
    display: block;
  }

  // 12x100
  &--phone_holder {
    height: 1.67%;
    right: calc(.83% * 24);
    top: calc(1.67% * 10);
    transform: rotate(30deg);
    width: 5.7%;
  }

  // 12x200
  &--tablet_holder {
    height: 1.67%;
    right: calc(.83% * 2);
    top: calc(1.67% * 9);
    transform: rotate(30deg);
    width: 19%;
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