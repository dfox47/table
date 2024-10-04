<script setup lang="ts">
import { RouterView } from 'vue-router'
import Footer from './components/Footer.vue'
import Header from './components/Header.vue'
import Desk from './components/Desk.vue'
</script>

<template>
  <div class="p-5">
    <Header />

    <RouterView />

    <Desk />

    <div>Color</div>

    <div>Size</div>

    <div>Technical description</div>

    <table>
      <tbody>
      <tr>
        <td>Weight</td>
        <td>50 Kg</td>
      </tr>
      </tbody>
    </table>

    <div class="flex justify-center">
      <a class="btn btn--main" href=""><span class="font-extralight">Confirm</span></a>
    </div>

    <Footer />
  </div>
</template>

<style lang="scss" scoped>
.btn {
  align-items: center;
  cursor: pointer;
  display: flex;
  justify-content: center;
  margin: 0 auto;
  overflow: hidden;
  position: relative;
  text-transform: uppercase;
  z-index: 1;

  &--main {
    background-color: #183153;
    border-radius: 5px;
    border: none;
    box-shadow: 0 6px 24px 0 rgba(#000, .2);

    &::after {
      background-color: #ffd401;
      content: " ";
      height: 100%;
      position: absolute;
      right: 0;
      transition: all 0.4s ease-in-out;
      width: 0;
    }

    &:hover::after {
      right: auto;
      left: 0;
      width: 100%;
    }

    span {
      color: #fff;
      font-size: 1.125em;
      letter-spacing: 0.3em;
      padding: 18px 25px;
      text-align: center;
      text-decoration: none;
      transition: all .3s ease-in-out;
      width: 100%;
      z-index: 20;
    }

    &:hover span {
      color: #183153;
      animation: scaleUp 0.3s ease-in-out;
    }

    @keyframes scaleUp {
      0% {
        transform: scale(1);
      }

      50% {
        transform: scale(0.95);
      }

      100% {
        transform: scale(1);
      }
    }

  }
}
</style>