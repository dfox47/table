<template>
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

const sendMail = async () => {
 try {
   const formData = {
      name: name.value,
      email: email.value,
      message: message.value,
      bottomColor: props.sendFormData.bottomColor,
      mainColor: props.sendFormData.mainColor,
      ventHoles: props.sendFormData.ventHoles,
      deskLegs: props.sendFormData.deskLegs,
      phoneHolder: props.sendFormData.phoneHolder,
      tabletHolder: props.sendFormData.tabletHolder,
      whiteboard: props.sendFormData.whiteboard,
   }

   console.log('formData', formData)

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
   console.error("Failed to send email:", error)
   emailStatus.value = "An error occurred while sending the email."
 }
}

const email = ref()
const message = ref()
const name = ref()

// const email = ref('xx@xx.xx')
// const message = ref('test')
// const name = ref('Test name')

// Reactive variable for email status message
const emailStatus = ref('')
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