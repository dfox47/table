<template>
  <h1 class="h1">Clean desk</h1>

  <Desk />

  <Gallery />

  <h2 class="h2">Cart</h2>

  <div class="contacts">
    <form style="display: none;" class="send_order_form" action="" @submit.prevent="sendMail">
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

    <form @submit.prevent="sendMail">
      <input v-model="formData.name" type="text" placeholder="Your Name" required>
      <input v-model="formData.email" type="email" placeholder="Your Email" required>
      <textarea v-model="formData.message" placeholder="Your Message" required>Snow message</textarea>
      <button type="submit">Send Email</button>
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
