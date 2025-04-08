<template>
  <h2 id="cart" class="h2">{{ $t('header.cart') }}</h2>

  <div class="contacts">
    <form @submit.prevent="sendMail" class="send_order_form">
      <label class="send_order_form__label">
        <input v-model="name" class="send_order_form__input" type="text" required />
        <span class="send_order_form__input-title">{{ $t('contacts.name') }}</span>
      </label>

      <label class="send_order_form__label">
        <input v-model="email" class="send_order_form__input" type="email" required />
        <span class="send_order_form__input-title">{{ $t('contacts.email') }}</span>
      </label>

      <label class="send_order_form__label">
        <input v-model="number" class="send_order_form__input" type="text" required />
        <span class="send_order_form__input-title">{{ $t('contacts.number') }}</span>
      </label>

      <div class="send_order_form__label">
        <textarea class="send_order_form__textarea" v-model="message" required />
        <span class="send_order_form__input-title">{{ $t('contacts.message') }}</span>
      </div>

      <div class="flex justify-center">
        <button class="btn btn--main w-full" type="submit">
          <span class="font-extralight">{{ $t('contacts.submit') }}</span>
        </button>
      </div>

      <p v-if="emailStatus">{{ emailStatus }}</p>
    </form>
  </div>
</template>

<script lang="ts" setup>
import type { Product } from '@/types';
import { ref } from 'vue'

const props = defineProps<{ sendFormData: Product }>()

const email = ref()
const emailStatus = ref('')
const message = ref()
const name = ref()
const number = ref()

const sendMail = async () => {
 try {
   const formData = {
      bottomColor: props.sendFormData.bottomColor,
      deskLegs: props.sendFormData.deskLegs,
      email: email.value,
      mainColor: props.sendFormData.mainColor,
      message: message.value,
      name: name.value,
      number: number.value,
      phoneHolder: props.sendFormData.phoneHolder,
      tabletHolder: props.sendFormData.tabletHolder,
      ventHoles: props.sendFormData.ventHoles,
      whiteboard: props.sendFormData.whiteboard,
   }

   const response = await fetch('/sendmail.php', {
     body: JSON.stringify(formData),
     headers: { 'Content-Type': 'application/json' },
     method: 'POST'
   })

   const rawResponse = await response.text()
   const result = JSON.parse(rawResponse)

   if (response.ok) {
     emailStatus.value = result.message
   } else {
     emailStatus.value = `Error: ${result.message}`
   }
 } catch (error) {
   emailStatus.value = "An error occurred while sending the email."
 }
}
</script>

<style lang="scss">
@use "@/assets/css/_vars" as *;

.send_order_form {
  display: grid;
  flex-direction: column;
  gap: calc($space * 1.5);
  margin: 0 auto $space;
  max-width: 300px;

  &__input,
  &__textarea {
    border-radius: $border_radius;
    border: 1px solid rgba($c_primary, 0.4);
    padding: 0.7em 1em;
    resize: none;
    width: 100%;
  }

  &__textarea {
    min-height: 100px;
  }

  &__input-title {
    bottom: 100%;
    font-size: 0.8em;
    left: 0;
    margin: 0 0 0.3em;
    opacity: 0.7;
    position: absolute;
    text-align: center;
  }

  &__label {
    display: flex;
    position: relative;
  }
}
</style>