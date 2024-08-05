<script setup>
import { reactive, defineProps } from "vue";

const props = defineProps({
    errors: {
        type: Object,
        default: () => ({}),
    },
    flash: {
        type: Object,
        default: () => ({}),
    },
});

const form = reactive({
    name: "",
    email: "",
    message: "",
});
</script>

<template>
    <div class="w-full p-4">
        <h1 class="text-center font-semibold text-2xl my-4">Contact Us</h1>
        <form @submit.prevent="submitForm" class="max-w-[600px] mx-auto">
            <div>
                <label for="name">Name</label>
                <br />
                <input
                    type="text"
                    v-model="form.name"
                    class="w-full rounded-lg"
                    placeholder="Enter your name"
                />
                <span v-if="errors.name">{{ errors.name }}</span>
            </div>
            <br />
            <div>
                <label for="email">Email</label>
                <br />
                <input
                    type="email"
                    v-model="form.email"
                    class="w-full rounded-lg"
                    placeholder="Enter your name"
                />
                <span v-if="errors.email">{{ errors.email }}</span>
            </div>
            <br />
            <div>
                <label for="message">Message</label>
                <br />
                <textarea
                    v-model="form.message"
                    class="w-full rounded-lg"
                    placeholder="Enter your name"
                ></textarea>
                <span v-if="errors.message">{{ errors.message }}</span>
            </div>
            <button
                type="submit"
                class="my-5 bg-green-600 text-white px-5 py-2 rounded-lg shadow-md"
            >
                Send
            </button>
        </form>
        <div v-if="flash.message">{{ flash.message }}</div>
    </div>
</template>
