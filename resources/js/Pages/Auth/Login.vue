<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, useForm } from "@inertiajs/vue3";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    // Menggunakan URL path langsung '/login' untuk menghindari konflik route helper
    form.post("/login", {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <!-- <GuestLayout> -->
        <Head title="Log in - Admin KPM" />

        <div class="min-h-[85vh] flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-50">
            
            <div class="mb-6 text-center">
                <h2 class="text-2xl font-bold text-gray-800">Panel CMS KPM</h2>
                <p class="text-sm text-gray-500 mt-1">
                    Silakan masuk menggunakan akun Administrator
                </p>
            </div>

            <div class="w-full sm:max-w-md px-6 py-8 bg-white shadow-sm overflow-hidden sm:rounded-lg border border-gray-100">
                
                <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
                    {{ status }}
                </div>

                <form @submit.prevent="submit" class="space-y-4">
                    <div>
                        <InputLabel for="email" value="Email" />

                        <TextInput
                            id="email"
                            type="email"
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            v-model="form.email"
                            required
                            autofocus
                            autocomplete="username"
                        />

                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div>
                        <InputLabel for="password" value="Password" />

                        <TextInput
                            id="password"
                            type="password"
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            v-model="form.password"
                            required
                            autocomplete="current-password"
                        />

                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <div class="block">
                        <!-- <label class="flex items-center">
                            <Checkbox
                                name="remember"
                                v-model:checked="form.remember"
                                class="rounded text-indigo-600 focus:ring-indigo-500"
                            />
                            <span class="ms-2 text-sm text-gray-600">Remember me</span>
                        </label> -->
                    </div>

                    <div class="flex items-center justify-between pt-2">
                        <!-- <a
                            v-if="canResetPassword"
                            href="/forgot-password"
                            class="rounded-md text-sm text-indigo-600 hover:text-indigo-800 underline focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                        >
                            Forgot password?
                        </a> -->

                        <PrimaryButton
                            class="w-full sm:w-auto justify-center px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 transition rounded-lg text-white font-semibold text-sm shadow-md"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Log in
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    <!-- </GuestLayout> -->
</template>