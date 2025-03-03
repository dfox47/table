<template>
  <h1 class="h1">Clean desk</h1>

  <div class="subtitle">Work. Play. Enjoy</div>
  <div class="subtitle-description"></div>

  <Desk v-model="model" />

  <!-- <Gallery /> -->

  <h2 class="h2">Cart</h2>

  <div class="contacts">
    <form @submit.prevent="sendMail" class="send_order_form">
      <label class="send_order_form__label">
        <input v-model="name" class="send_order_form__input" type="text" required />
        <span class="send_order_form__input-title">Name</span>
      </label>

      <label class="send_order_form__label">
        <input v-model="email" class="send_order_form__input" type="email" required />
        <span class="send_order_form__input-title">E-mail</span>
      </label>

      <div class="send_order_form__label">
        <textarea class="send_order_form__textarea" v-model="message" required />
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
import { onMounted, reactive, ref } from "vue"
import Gallery from "@/components/Gallery.vue"
import Desk from "@/components/desk/Desk.vue"
import type { Product } from "../types"

const model = reactive<Product>({
  bottomColor: "bg_3",
  mainColor: "bg_1",
  phoneHolder: {
    position: "both",
    price: 20,
    value: true
  },
  tabletHolder: {
    position: "both",
    price: 20,
    value: true
  },
  ventHoles: {
    position: "left",
    price: 20,
    value: true
  },
  whiteboard: {
    position: "both",
    price: 20,
    value: true
  }
})

const email = ref("xx@xx.xx")
const message = ref("test")
const name = ref("Test name")


// Reactive variable for email status message
const emailStatus = ref("")

// Function to send email
const sendMail = async () => {
  try {
    const formData = {
      name: name.value,
      email: email.value,
      message: message.value,
      bottomColor: model.bottomColor,
      mainColor: model.mainColor,
      phoneHolder: model.phoneHolder,
      tabletHolder: model.tabletHolder,
      ventHoles: model.ventHoles,
      whiteboard: model.whiteboard
    }

    const response = await fetch("/sendmail.php", {
      body: JSON.stringify(formData),
      headers: { "Content-Type": "application/json" },
      method: "POST"
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

onMounted(() => {
  document.title =
    "Home | Order comfortable & simple desk for development, design, gaming. IT desk. Game desk."
})
</script>

<style lang="scss" scoped>
@use "@/assets/css/_vars" as *;

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

.subtitle {
  font-size: 3em;
  font-weight: 700;
  text-align: center;
  text-transform: uppercase;
}
</style>
