<template>
  <h1 class="h1">Clean desk</h1>

  <Desk />

  <Gallery />

  <h2 class="h2">Cart</h2>

  <div class="contacts">
    <form @submit.prevent="sendMail" class="send_order_form">
      <label class="send_order_form__label">
        <input v-model="formData.name" class="send_order_form__input" type="text" required>
        <span class="send_order_form__input-title">Name</span>
      </label>

      <label class="send_order_form__label">
        <input v-model="formData.email" class="send_order_form__input" type="email" required>
        <span class="send_order_form__input-title">E-mail</span>
      </label>

      <div class="send_order_form__label">
        <textarea class="send_order_form__textarea" v-model="formData.message" required />
        <span class="send_order_form__input-title">Message</span>
      </div>

      <div class="flex justify-center">
        <button class="btn btn--main w-full" type="submit">
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
  gap: $space;
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
