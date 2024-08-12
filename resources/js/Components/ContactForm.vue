<script setup>
import { reactive, defineProps, ref, watch, computed } from "vue";
import { router } from "@inertiajs/vue3";

const props = defineProps({
    errors: Object,
    flash: Object,
});

const form = reactive({
    name: "",
    email: "",
    message: "",
});

const flashTimeout = ref(null);

const showFlash = computed(() => {
    return !!props.flash.message;
});

watch(
    () => props.flash.message,
    (newMessage) => {
        if (newMessage) {
            clearTimeout(flashTimeout.value);
            flashTimeout.value = setTimeout(() => {
                props.flash.message = null;
            }, 3000);
        }
    },
    { immediate: true }
);

function submitForm() {
    router.post(route("dashboard.store"), form);
}
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
                <span v-if="errors" class="text-red-500">{{
                    errors.name
                }}</span>
            </div>
            <br />
            <div>
                <label for="email">Email</label>
                <br />
                <input
                    type="email"
                    v-model="form.email"
                    class="w-full rounded-lg"
                    placeholder="Enter your email"
                />
                <span v-if="errors" class="text-red-500">
                    {{ errors.email }}
                </span>
            </div>
            <br />
            <div>
                <label for="message">Message</label>
                <br />
                <textarea
                    v-model="form.message"
                    class="w-full rounded-lg"
                    placeholder="Enter your message"
                ></textarea>
                <span v-if="errors" class="text-red-500">
                    {{ errors.message }}
                </span>
            </div>
            <button
                type="submit"
                class="my-5 bg-green-600 text-white px-5 py-2 rounded-lg shadow-md"
            >
                Send
            </button>
        </form>
        <div v-if="showFlash && flash.message" class="text-green-500">
            {{ flash.message }}
        </div>
    </div>
</template>
