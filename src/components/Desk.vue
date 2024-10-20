<template>
  <h2 class="h2">Construct your desk</h2>

  <div class="desk_wrapper">
    <div class="desk_preview">
      <div class="desk_top border rounded" :class="'desk_top--' + model.mainColor">
        <div class="desk_item desk_item--phone_holder" v-if="model.phoneHolder.value"></div>

        <div class="desk_item desk_item--tablet_holder" v-if="model.tabletHolder.value"></div>

        <div class="desk_item desk_item--whiteboard" v-if="model.whiteboard.value"></div>

        <div class="desk_holes" v-if="model.ventHoles.value">
          <span class="desk_holes__item" v-for="item in 35" :key="item"></span>
        </div>
      </div>

      <div class="desk_side">
        <div class="desk_side__item" :class="'desk_side__item--' + model.mainColor"></div>
        <div class="desk_side__item" :class="'desk_side__item--' + model.bottomColor"></div>
      </div>
    </div>

    <div class="desk_options">
      <ul class="desk_options_list">
        <li>
          <el-checkbox
            v-model="model.whiteboard.value"
            label="Whiteboard"
            size="large"
          />
        </li>

        <li>
          <el-checkbox
            v-model="model.phoneHolder.value"
            label="Phone holder"
            size="large"
          />
        </li>

        <li>
          <el-checkbox
            v-model="model.tabletHolder.value"
            label="Tablet holder"
            size="large"
          />
        </li>

        <li>
          <el-checkbox
            v-model="model.ventHoles.value"
            label="Vent holes"
            size="large"
          />
        </li>
      </ul>

      <h3>Top color</h3>

      <el-select
        v-model="model.mainColor"
        placeholder="Select"
        size="large"
        style="width: 240px"
      >
        <el-option
          v-for="item in colorSelected"
          :key="item.value"
          :label="item.label"
          :value="item.value"
        />
      </el-select>

      <h3>Bottom color</h3>

      <el-select
        v-model="model.bottomColor"
        placeholder="Select"
        size="large"
        style="width: 240px"
      >
        <el-option
          v-for="item in colorSelected"
          :key="item.value"
          :label="item.label"
          :value="item.value"
        />
      </el-select>
    </div>
  </div>

  <h2 class="h2">Technical description</h2>

  <table>
    <tbody>
    <tr>
      <td>Weight</td>
      <td>50 Kg</td>
    </tr>

    <tr>
      <td>Size</td>
      <td>1200x600 mm</td>
    </tr>
    </tbody>
  </table>

  <div class="flex justify-center">
    <a class="btn btn--main" href="">
      <span class="font-extralight">Add to cart</span>
    </a>
  </div>
</template>

<script lang="ts" setup>
import { reactive } from "vue"

const colorSelected = reactive([
  {
    value: 'black',
    label: 'Black',
  },
  {
    value: 'blue',
    label: 'Blue'
  },
  {
    value: 'orange',
    label: 'Orange'
  },
  {
    value: 'red',
    label: 'Red'
  },
])

const positionSelected = reactive([
  'left',
  'right'
])

const model = reactive({
  bottomColor: 'black',
  mainColor: 'blue',
  phoneHolder: {
    position: 'right',
    value: true,
    price: 20
  },
  tabletHolder: {
    position: 'right',
    value: true,
    price: 20
  },
  ventHoles: {
    value: true
  },
  whiteboard: {
    position: 'left',
    value: true,
    price: 20
  },
})
</script>

<style lang="scss" scoped>
@use '@/assets/css/_vars' as *;

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
    background-color: #fff;
    border: 1px solid $c_border;
    border-radius: 50%;
    height: calc(3.7% * 3);
    width: calc(2.6% * 3);
  }
}

// 1200x600 mm | 10mm = 0.83 x 1.67
.desk_item {
  border: 1px solid $c_border;
  border-radius: .2em;
  position: absolute;
  z-index: 1;

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
    background-color: #fff;
    bottom: calc(1.67% * 1.5);
    height: 49.5%;
    left: calc(.83% * 1.5);
    width: 17.5%;
  }
}

.desk_preview {
  display: grid;
  max-width: 500px;
  width: 100%;
}

.desk_side {
  &__item {
    height: .5em;
    width: 100%;

    &:last-child {
      border-top: 0;
    }

    &--black {
      background-color: #000;
    }

    &--blue {
      background-color: #1e98a5;
    }

    &--orange {
      background-color: #b9640d;
    }

    &--red {
      background-color: #bd1d1d;
    }
  }
}

.desk_top {
  background-color: #fff;
  margin: 0 auto 1em;
  max-width: 500px;
  position: relative;
  width: 100%;

  &::after {
    content: "";
    display: block;
    padding: 50% 0 0;
    position: relative;
  }

  &--black {
    background-color: #000;
  }

  &--blue {
    background-color: #1e98a5;
  }

  &--orange {
    background-color: #b9640d;
  }

  &--red {
    background-color: #bd1d1d;
  }
}

.desk_wrapper {
  display: grid;
  grid-template-columns: 3fr 2fr;
  gap: 1em;
  margin: 0 0 5em;
}
</style>
