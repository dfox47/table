<template>
  <h2 class="h2">Construct desk</h2>

  <div class="desk_wrapper p-5">
    <div class="desk_preview">
      <div class="desk_top border rounded" :class="model.mainColor">
        <div class="desk_preview__title">Top</div>

        <div class="desk_item desk_item__phone_holder"
             :class="model.bottomColor"
             v-if="model.phoneHolder.position == 'right' || model.phoneHolder.position == 'both'"
        />

        <div class="desk_item desk_item__phone_holder desk_item__phone_holder--left"
             :class="model.bottomColor"
             v-if="model.phoneHolder.position == 'left' || model.phoneHolder.position == 'both'"
        />

        <div class="desk_item desk_item__tablet_holder"
             :class="model.bottomColor"
             v-if="model.tabletHolder.position == 'right' || model.tabletHolder.position == 'both'"
        />

        <div class="desk_item desk_item__tablet_holder desk_item__tablet_holder--left"
             :class="model.bottomColor"
             v-if="model.tabletHolder.position == 'left' || model.tabletHolder.position == 'both'"
        />

        <div class="desk_item desk_item__whiteboard"
             v-if="model.whiteboard.position == 'right' || model.whiteboard.position == 'both'"
        />

        <div class="desk_item desk_item__whiteboard desk_item__whiteboard--left"
             v-if="model.whiteboard.position == 'left' || model.whiteboard.position == 'both'"
        />

        <div class="desk_holes" v-if="model.ventHoles.value">
          <span class="desk_holes__item" v-for="item in 42" :key="item"/>
        </div>
      </div>

      <div class="desk_side_wrapper">
        <div class="desk_preview__title">Side</div>

        <div class="desk_side">
          <div class="desk_side__item" :class="model.mainColor"/>
          <div class="desk_side__item" :class="model.bottomColor"/>
        </div>
      </div>
    </div>

    <div class="desk_options">
      <h3>Whiteboard</h3>

      <el-radio-group
        v-model="model.whiteboard.position"
        @input="setWhiteboard"
        placeholder="Select"
        size="large"
      >
        <el-radio
          v-for="item in positionSelected"
          :key="item"
          :label="item"
          :value="item"
        />
      </el-radio-group>

      <h3>Phone holder</h3>

      <el-radio-group
        v-model="model.phoneHolder.position"
        @input="setPhoneHolder"
        placeholder="Select"
        size="large"
      >
        <el-radio
          v-for="item in positionSelected"
          :key="item"
          :label="item"
          :value="item"
        />
      </el-radio-group>

      <h3>Tablet holder</h3>

      <el-radio-group
        v-model="model.tabletHolder.position"
        @input="setTabletHolder"
        placeholder="Select"
        size="large"
      >
        <el-radio
          v-for="item in positionSelected"
          :key="item"
          :label="item"
          :value="item"
        />
      </el-radio-group>

      <ul class="desk_options_list">
        <li>
          <el-checkbox
            v-model="model.ventHoles.value"
            @input="setVentHoles"
            label="Vent holes"
            size="large"
          />
        </li>
      </ul>

      <h3>Desk | top color</h3>

      <el-radio-group
        v-model="model.mainColor"
        @input="setMainColor"
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

      <h3>Desk | bottom color</h3>

      <el-radio-group
        v-model="model.bottomColor"
        @input="setBottomColor"
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
    </div>
  </div>

  <DeskDescription />
</template>

<script setup lang="ts">
import { reactive } from "vue"
import DeskDescription from '@/components/desk/DeskDescription.vue'

const emit = defineEmits([
  'updateBottomColor',
  'updateMainColor',
  'updatePhoneHolder',
  'updateTabletHolder',
  'updateVentHoles',
  'updateWhiteboard'
])

const setBottomColor = () => {
  emit('updateBottomColor', model.bottomColor)
}

const setMainColor = () => {
  emit('updateMainColor', model.mainColor)
}

const setPhoneHolder = () => {
  emit('updatePhoneHolder', model.phoneHolder.position)
}

const setTabletHolder = () => {
  emit('updateTabletHolder', model.tabletHolder.position)
}

const setVentHoles = () => {
  emit('updateVentHoles', model.ventHoles.value)
}

const setWhiteboard = () => {
  emit('updateWhiteboard', model.whiteboard.position)
}

const colorSelected = reactive([
  {
    value: 'bg_0',
    label: 'Black',
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
  {
    value: 'bg_4',
    label: 'Grey'
  },
  {
    value: 'bg_5',
    label: 'Light grey'
  },
])

const positionSelected = reactive([
  'none',
  'left',
  'right',
  'both',
])

const model = reactive({
  bottomColor: 'bg_3',
  mainColor: 'bg_1',
  phoneHolder: {
    position: 'both',
    price: 20,
    value: true
  },
  tabletHolder: {
    position: 'both',
    price: 20,
    value: true
  },
  ventHoles: {
    position: 'left',
    price: 20,
    value: true
  },
  whiteboard: {
    position: 'both',
    price: 20,
    value: true
  },
})
</script>

<style lang="scss">
@use '@/assets/css/_vars' as *;

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
  width: calc(.83% * 39);

  &__item {
    background-color: #fff;
    border: 1px solid $c_border;
    border-radius: 50%;
    width: calc(2.6% * 3);

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
    right: calc(.83% * 26);
    top: calc(1.67% * 3.5);
    transform: rotate(30deg);
    width: 7%;

    &--left {
      left: calc(.83% * 26);
      right: auto;
      transform: rotate(-30deg);
    }
  }

  // 12x200 mm
  &__tablet_holder {
    height: 1.67%;
    right: calc(.83%);
    top: calc(1.67% * 8);
    transform: rotate(30deg);
    width: 21%;

    &--left {
      left: calc(.83%);
      right: auto;
      transform: rotate(-30deg);
    }
  }

  // 210x297
  &__whiteboard {
    background-color: #fff;
    bottom: calc(1.67% * 1.5);
    height: 49.5%;
    right: calc(.83% * 1.5);
    width: 17.5%;

    &--left {
      left: calc(.83% * 1.5);
      right: auto;
    }
  }
}

.desk_options {
  max-width: 320px;
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
    opacity: .5;
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

    &:last-child {
      border-radius: 0 0 $border_radius $border_radius;
      border-top: 0;
    }
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
