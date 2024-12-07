<template>
  <h1 class="h1">Clean desk</h1>

  <Desk />

  <Gallery />

  <h2 class="h2">Cart</h2>

  <div class="contacts">
    <form class="send_order_form" action="" @submit.prevent="sendMail">
      <label class="send_order_form__label">
        <span class="send_order_form__title">Address</span>
        <input class="send_order_form__input" type="text">
      </label>

      <label class="send_order_form__label">
        <span class="send_order_form__title">Contact phone</span>
        <input class="send_order_form__input" type="text">
      </label>

      <label class="send_order_form__label">
        <span class="send_order_form__title">E-mail</span>
        <input class="send_order_form__input" type="text">
      </label>

      <div class="flex justify-center">
        <a class="btn btn--main" href="">
          <span class="font-extralight">Add to cart</span>
        </a>
      </div>
    </form>
  </div>
</template>

<script setup lang="ts">
import { onMounted } from 'vue'
import Desk from '@/components/desk/Desk.vue'
import Gallery from '@/components/Gallery.vue'
import { Email } from '@/assets/js/smtp.js'

const sendMail = Email.send({
  Host : "smtp.elasticemail.com",
  Username : "username",
  Password : "password",
  To : 'them@website.com',
  From : "you@isp.com",
  Subject : "This is the subject",
  Body : "And this is the body"
}).then(
  message => alert(message)
)

onMounted(() => {
  document.title = 'Home | Order comfortable & simple desk for development, design, gaming. IT desk. Game desk.'
})
</script>
