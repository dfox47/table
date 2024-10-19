<template>
  <h2 class="h2">Constructor</h2>

  <div class="desk_preview border border-gray-400 rounded">
    <div class="desk_item desk_item--phone_holder border border-gray-700 rounded active" v-if="model.phoneHolder.value"></div>

    <div class="desk_item desk_item--tablet_holder border border-gray-700 rounded active"  v-if="model.tabletHolder.value"></div>

    <div class="desk_item desk_item--whiteboard border border-gray-700 rounded active"  v-if="model.whiteboard.value"></div>

    <div class="desk_holes">
      <span class="desk_holes__item" v-for="item in 35" :key="item"></span>
    </div>
  </div>

  <ul class="desk_options">
    <li>
      <el-checkbox
          v-model="model.whiteboard.value"
          label="Whiteboard"
          size="large"
      />

<!--      <label class="checkbox cursor-pointer">-->
<!--        <input type="checkbox" name="desk_white_board">-->
<!--        <span class="checkbox__icon"></span>-->
<!--        <span class="checkbox__title">Whiteboard</span>-->
<!--      </label>-->
    </li>

    <li>
      <el-checkbox
          v-model="model.phoneHolder.value"
          label="Phone holder"
          size="large"
      />

<!--      <label class="checkbox cursor-pointer">-->
<!--        <input type="checkbox" name="desk_phone_holder">-->
<!--        <span class="checkbox__icon"></span>-->
<!--        <span class="checkbox__title">Phone holder</span>-->
<!--      </label>-->
    </li>

    <li>
      <el-checkbox
          v-model="model.tabletHolder.value"
          label="Tablet holder"
          size="large"
      />

<!--      <label class="checkbox cursor-pointer">-->
<!--        <input type="checkbox" name="desk_tablet_holder">-->
<!--        <span class="checkbox__icon"></span>-->
<!--        <span class="checkbox__title">Tablet holder</span>-->
<!--      </label>-->
    </li>
  </ul>

  <div>
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

<!--    <select v-model="selectModel">-->
<!--      <option value="black">Black</option>-->
<!--      <option value="blue">Blue</option>-->
<!--      <option value="orange">Orange</option>-->
<!--      <option value="red">Red</option>-->
<!--    </select>-->
  </div>

  <div>
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

<!--    <select>-->
<!--      <option value="black">Black</option>-->
<!--      <option value="blue">Blue</option>-->
<!--      <option value="orange">Orange</option>-->
<!--      <option value="red">Red</option>-->
<!--    </select>-->
  </div>

  <div>Size</div>

  <h2 class="h2">Technical description</h2>

  <table>
    <tbody>
    <tr>
      <td>Weight</td>
      <td>50 Kg</td>
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
import { reactive, ref } from "vue"

const colorSelected = reactive([
  {
    value: 'black',
    label: 'black',
  },
  {
    value: 'blue',
    label: 'blue'
  },
  {
    value: 'orange',
    label: 'orange'
  },
  {
    value: 'red',
    label: 'red'
  },
])

const positionSelected = reactive([
    'left',
    'right'
])

const model = reactive({
  mainColor: '',
  bottomColor: '',
  whiteboard: {
    position: 'left',
    value: true,
    price: 20
  },
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
})

</script>

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
