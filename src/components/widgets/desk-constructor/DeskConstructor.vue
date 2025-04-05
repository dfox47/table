<template>
  <h2 id="desk-desciption-title" class="h2">{{ $t('table.description.title') }}</h2>

  <div class="desk_wrapper p-5">
    <div class="desk_preview">
      <div class="desk_top border rounded" :class="model.mainColor">
        <div class="desk_preview__title">{{ $t('position.top') }}</div>

        <div
          class="desk_item desk_item__phone_holder"
          :class="model.bottomColor"
          v-if="model.phoneHolder == 'right' || model.phoneHolder == 'both'"
        />

        <div
          class="desk_item desk_item__phone_holder desk_item__phone_holder--left"
          :class="model.bottomColor"
          v-if="model.phoneHolder == 'left' || model.phoneHolder == 'both'"
        />

        <div
          class="desk_item desk_item__tablet_holder"
          :class="model.bottomColor"
          v-if="model.tabletHolder == 'right' || model.tabletHolder == 'both'"
        />

        <div
          class="desk_item desk_item__tablet_holder desk_item__tablet_holder--left"
          :class="model.bottomColor"
          v-if="model.tabletHolder == 'left' || model.tabletHolder == 'both'"
        />

        <div
          class="desk_item desk_item__whiteboard"
          v-if="model.whiteboard == 'right' || model.whiteboard == 'both'"
        />

        <div
          class="desk_item desk_item__whiteboard desk_item__whiteboard--left"
          v-if="model.whiteboard == 'left' || model.whiteboard == 'both'"
        />

        <div class="desk_holes" v-if="model.ventHoles">
          <span class="desk_holes__item" v-for="item in 48" :key="item" :class="model.bottomColor" />
        </div>
      </div>

      <div class="desk_side_wrapper">
        <div class="desk_preview__title">{{ $t('position.side') }}</div>

        <div class="desk_side">
          <div class="desk_side__item" :class="model.mainColor" />
          <div class="desk_side__item" :class="model.bottomColor" />
          <div v-if="model.deskLegs" class="desk_side__legs">
            <img src="@/assets/i/legs_with_controller.png" alt="">
          </div>
        </div>
      </div>
    </div>

    <div class="desk_options">
      <h3>{{ $t('whiteboard.label') }}</h3>

      <el-radio-group v-model="model.whiteboard" placeholder="Select" size="large">
        <el-radio v-for="item in positionSelected" :key="item" :label="$t('whiteboard.position.' + item) + ' (+' + phoneHolderPrice[item] + ' €)'" :value="item" />
      </el-radio-group>

      <h3>{{ $t('holder.phone') }}</h3>

      <el-radio-group v-model="model.phoneHolder" placeholder="Select" size="large">
        <el-radio v-for="item in positionSelected" :key="item" :label="$t('phone.position.' + item) + ' (+' + phoneHolderPrice[item] + ' €)'" :value="item" />
      </el-radio-group>

      <h3>{{ $t('holder.tablet') }}</h3>

      <el-radio-group v-model="model.tabletHolder" placeholder="Select" size="large">
        <el-radio v-for="item in positionSelected" :key="item" :label="$t('tablet.position.' + item) + ' (+' + phoneHolderPrice[item] + ' €)'" :value="item" />
      </el-radio-group>

      <ul class="desk_options_list">
        <li>
          <el-checkbox v-model="model.ventHoles" :label="$t('vent.holes') + ' (+' + ventHolesPrice + ' €)'"  size="large" />
          <el-checkbox v-model="model.deskLegs" :label="$t('desk.legs') + ' (+' + legsPrice + ' €)'" size="large" />
        </li>
      </ul>

      <h3>{{ $t('desk.color.top') }}</h3>

      <el-radio-group
        v-model="model.mainColor"
        validate-event
        class="desk-colors-selector"
        placeholder="Select"
        size="large"
      >
        <el-radio-button
          v-for="item in colorSelected"
          :key="item.value"
          :value="item.value"
          class="desk-colors-selector__label"
          :class="'desk-colors-selector__label--' + item.value"
        />
      </el-radio-group>

      <h3>{{ $t('desk.color.bottom') }}</h3>

      <el-radio-group v-model="model.bottomColor" placeholder="Select" size="large">
        <el-radio-button
          v-for="item in colorSelected"
          :key="item.value"
          :value="item.value"
          class="desk-colors-selector__label"
          :class="'desk-colors-selector__label--' + item.value"
        />
      </el-radio-group>

      <h3 class="text-2xl">{{ $t('price.total') }}: <span class="font-black">{{ commonPrice }} €</span></h3>
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed } from "vue"
import type { Product } from "@/types"
import { Position } from '@/types'

const model = defineModel<Product>({
  default: {
    bottomColor: 'bg_0',
    mainColor: 'bg_1',
    ventHoles: true,
    deskLegs: true,
    phoneHolder: Position.BOTH,
    tabletHolder:  Position.BOTH,
    whiteboard: Position.BOTH,
  }
})

const colorSelected = [
  {
    value: 'bg_0',
    label: 'Black'
  },
  {
    value: 'bg_1',
    label: 'Blue'
  },
  {
    value: 'bg_2',
    label: 'Orange'
  },
  {
    value: 'bg_3',
    label: 'Red'
  },
  // Maybe we will use it later | don't delete it
  // {
  //   value: 'bg_4',
  //   label: 'Grey'
  // },
  // {
  //   value: 'bg_5',
  //   label: 'Light grey'
  // }
]

const positionSelected = [Position.NONE, Position.LEFT, Position.RIGHT, Position.BOTH]

const phoneHolderPrice = {
  [Position.NONE]: 0,
  [Position.LEFT]: 5,
  [Position.RIGHT]: 5,
  [Position.BOTH]: 10
}

const tabletHolderPrice = {
  [Position.NONE]: 0,
  [Position.LEFT]: 5,
  [Position.RIGHT]: 5,
  [Position.BOTH]: 10
}

const whiteboardPrice = {
  [Position.NONE]: 0,
  [Position.LEFT]: 10,
  [Position.RIGHT]: 10,
  [Position.BOTH]: 20
}

// change price here
const legsPrice = 270
const ventHolesPrice = 10

const commonPrice = computed(() => {
  let price = 399;

  if (model.value.ventHoles) {
    price += model.value.ventHoles ? ventHolesPrice : 0;
  }

  if (model.value.deskLegs) {
    price += model.value.deskLegs ? legsPrice : 0;
  }

  // Убедитесь, что значения имеют правильный тип
  const phoneHolder = model.value.phoneHolder as Position;
  const tabletHolder = model.value.tabletHolder as Position;
  const whiteboard = model.value.whiteboard as Position;

  price += phoneHolderPrice[phoneHolder];
  price += tabletHolderPrice[tabletHolder];
  price += whiteboardPrice[whiteboard];

  return price
})
</script>

<style lang="scss">
@use "@/assets/css/_vars" as *;

:root {
  --el-radio-button-checked-border-color: $c_special;
}

h3 {
  margin: #{0.7 * $space} 0 #{0.1 * $space};

  &:first-child {
    margin-top: 0;
  }
}

.el-radio-button {
  &.desk-colors-selector {
    &__label {
      &--bg_0 {
        .el-radio-button__inner {
          background-color: $c_desk_color_0;
        }
      }

      &--bg_1 {
        .el-radio-button__inner {
          background-color: $c_desk_color_1;
        }
      }

      &--bg_2 {
        .el-radio-button__inner {
          background-color: $c_desk_color_2;
        }
      }

      &--bg_3 {
        .el-radio-button__inner {
          background-color: $c_desk_color_3;
        }
      }

      &--bg_4 {
        .el-radio-button__inner {
          background-color: $c_desk_color_4;
        }
      }

      &--bg_5 {
        .el-radio-button__inner {
          background-color: $c_desk_color_5;
        }
      }
    }
  }

  &.is-active {
    &.desk-colors-selector {
      &__label {
        &--bg_0 {
          .el-radio-button__original-radio:not(:disabled) + .el-radio-button__inner {
            background-color: $c_desk_color_0;
          }
        }

        &--bg_1 {
          .el-radio-button__original-radio:not(:disabled) + .el-radio-button__inner {
            background-color: $c_desk_color_1;
          }
        }

        &--bg_2 {
          .el-radio-button__original-radio:not(:disabled) + .el-radio-button__inner {
            background-color: $c_desk_color_2;
          }
        }

        &--bg_3 {
          .el-radio-button__original-radio:not(:disabled) + .el-radio-button__inner {
            background-color: $c_desk_color_3;
          }
        }

        &--bg_4 {
          .el-radio-button__original-radio:not(:disabled) + .el-radio-button__inner {
            background-color: $c_desk_color_4;
          }
        }

        &--bg_5 {
          .el-radio-button__original-radio:not(:disabled) + .el-radio-button__inner {
            background-color: $c_desk_color_5;
          }
        }
      }
    }
  }

  &--large {
    &.el-radio-button__inner {
      padding: 30px;
    }
  }
}

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
  width: calc(0.83% * 39);

  &__item {
    background-color: #fff;
    border: 1px solid $c_border;
    border-radius: 50%;
    width: 5.9%;

    &.bg_0 {
      border-color: $c_desk_color_0;
    }

    &.bg_1 {
      border-color: $c_desk_color_1;
    }

    &.bg_2 {
      border-color: $c_desk_color_2;
    }

    &.bg_3 {
      border-color: $c_desk_color_3;
    }

    &.bg_4 {
      border-color: $c_desk_color_4;
    }

    &.bg_5 {
      border-color: $c_desk_color_5;
    }

    &::after {
      content: "";
      display: block;
      padding: 100% 0 0;
    }
  }
}

// 1200x600 mm | 10mm = 0.83 x 1.67
.desk_item {
  border: 1px solid $c_border;
  border-radius: $border_radius;
  position: absolute;
  z-index: 1;

  // 12x100 mm
  &__phone_holder {
    height: 1.67%;
    right: calc(0.83% * 26);
    top: calc(1.67% * 3.5);
    transform: rotate(30deg);
    width: 7%;

    &--left {
      left: calc(0.83% * 26);
      right: auto;
      transform: rotate(-30deg);
    }
  }

  // 12x200 mm
  &__tablet_holder {
    height: 1.67%;
    right: calc(0.83%);
    top: calc(1.67% * 8);
    transform: rotate(30deg);
    width: 21%;

    &--left {
      left: calc(0.83%);
      right: auto;
      transform: rotate(-30deg);
    }
  }

  // 210x297
  &__whiteboard {
    background-color: #fff;
    bottom: calc(1.67% * 1.5);
    height: 49.5%;
    right: calc(0.83% * 1.5);
    width: 17.5%;

    &--left {
      left: calc(0.83% * 1.5);
      right: auto;
    }
  }
}

.desk_options {
  max-width: 440px;
  width: 100%;
}

.desk_preview {
  display: grid;
  max-width: 500px;
  width: 100%;

  &__title {
    bottom: 100%;
    font-size: 0.7em;
    left: 0;
    opacity: 0.5;
    position: absolute;
    text-transform: uppercase;
    z-index: 3;
  }
}

.desk_side {
  &__item {
    height: 0.5em;
    width: 100%;

    &:first-child {
      border-radius: $border_radius $border_radius 0 0;
    }
  }

  &__legs {
    width: 100%;
  }
}

.desk_side_wrapper {
  position: relative;
}

.desk_top {
  margin: 0 auto $space;
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

.desk_wrapper {
  align-items: flex-start;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: $space;
  margin: 0 0 #{2 * $space};
}
</style>
