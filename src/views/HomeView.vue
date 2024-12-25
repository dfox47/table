<template>
  <h1 class="h1">Clean desk</h1>

  <Desk />

  <Gallery />

  <h2 class="h2">Cart</h2>

  <div class="contacts">
    <form @submit.prevent="sendMail" class="send_order_form">
      <label class="send_order_form__label">
        <input v-model="formData.name" class="send_order_form__input" type="text" placeholder="Your Name" required>
        <span class="send_order_form__input-title">Your name</span>
      </label>

      <label class="send_order_form__label">
        <input v-model="formData.email" class="send_order_form__input" type="email" placeholder="Your Email" required>
        <span class="send_order_form__input-title">Your email</span>
      </label>

      <textarea class="send_order_form__textarea" v-model="formData.message" placeholder="Your Message" required>Snow message</textarea>

      <div class="flex justify-center">
        <button class="btn btn--main" type="submit">
          <span class="font-extralight">Submit order</span>
        </button>
      </div>

      <p v-if="emailStatus">{{ emailStatus }}</p>
    </form>
  </div>
</template>

<script setup lang="ts">
import { onMounted, ref } from 'vue'
import Desk from '@/components/desk/Desk.vue'
import Gallery from '@/components/Gallery.vue'

// Reactive data for form inputs
const formData = ref({
  email: 'xx@xx.xx',
  message: 'test',
  name: 'Test name',
})

// Reactive variable for email status message
const emailStatus = ref('')

// Function to send email
const sendMail = async () => {
  try {
    const response = await fetch('/sendmail.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(formData.value),
    })

    const rawResponse = await response.text()
    const result = JSON.parse(rawResponse)

    if (response.ok) {
      emailStatus.value = result.message
    } else {
      emailStatus.value = `Error: ${result.message}`
    }
  } catch (error) {
    console.error('Failed to send email:', error)
    emailStatus.value = 'An error occurred while sending the email.'
  }
}

onMounted(() => {
  document.title = 'Home | Order comfortable & simple desk for development, design, gaming. IT desk. Game desk.'
})
</script>

<style lang="scss" scoped>
@use '@/assets/css/_vars' as *;

.send_order_form {
  display: grid;
  flex-direction: column;
  gap: 1em;
  margin: 0 auto $space;
  max-width: 300px;

  &__input {
    border: 1px solid $c_primary;
    border-radius: $border_radius;
    margin: 0 0 0.5em;
    padding: 1em 2em;
    width: 100%;
  }

  &__input-title {
    left: 50%;
    position: absolute;
    text-align: center;
    top: 50%;
    transform: translate(-50%,-50%);
    width: 100%;
  }

  &__label {
    display: flex;
    position: relative;
  }

  &__textarea {
    border: 1px solid $c_primary;
    border-radius: $border_radius;
    margin: 0 0 0.5em;
    padding: 1em 2em;
    width: 100%;
  }
}
</style>
