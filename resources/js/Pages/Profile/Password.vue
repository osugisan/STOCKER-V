<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import ReturnButton from '@/Mycomponents/ReturnButton.vue';
import { Head, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const passwordInput = ref(null);
const currentPasswordInput = ref(null);
const returnURL = 'profile.edit'

const form = useForm({
    current_password: "",
    password: "",
    password_confirmation: "",
});

const updatePassword = () => {
    form.put(route("password.update"), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset("password", "password_confirmation");
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset("current_password");
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <Head title="パスワード変更" />

    <AuthenticatedLayout>
        <ReturnButton :returnURL="returnURL"/>

        <section class="text-gray-600 body-font">
            <div class="container md:px-5 py-10 mx-auto">
                <div class="p-2 mx-auto lg:w-2/3">
                    <div
                        class="relative bg-white rounded-lg shadow dark:bg-gray-700 mt-8"
                    >
                        <div
                            class="flex items-center p-4 rounded-t dark:border-gray-600"
                        >
                            <h3
                                class="text-xl font-medium text-gray-900 dark:text-white"
                            >
                                パスワード変更
                            </h3>
                        </div>
                        <form
                            @submit.prevent="updatePassword"
                            class="p-6 space-y-6"
                        >
                            <div>
                                <InputLabel
                                    for="current_password"
                                    value="現在のパスワード"
                                />

                                <TextInput
                                    id="current_password"
                                    ref="currentPasswordInput"
                                    v-model="form.current_password"
                                    type="password"
                                    class="mt-1 block w-full"
                                    autocomplete="current-password"
                                />

                                <InputError
                                    :message="form.errors.current_password"
                                    class="mt-2"
                                />
                            </div>

                            <div>
                                <InputLabel
                                    for="password"
                                    value="新しいパスワード"
                                />

                                <TextInput
                                    id="password"
                                    ref="passwordInput"
                                    v-model="form.password"
                                    type="password"
                                    class="mt-1 block w-full"
                                    autocomplete="new-password"
                                />

                                <InputError
                                    :message="form.errors.password"
                                    class="mt-2"
                                />
                            </div>

                            <div>
                                <InputLabel
                                    for="password_confirmation"
                                    value="パスワードの確認"
                                />

                                <TextInput
                                    id="password_confirmation"
                                    v-model="form.password_confirmation"
                                    type="password"
                                    class="mt-1 block w-full"
                                    autocomplete="new-password"
                                />

                                <InputError
                                    :message="form.errors.password_confirmation"
                                    class="mt-2"
                                />
                            </div>

                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing"
                                    >更新</PrimaryButton
                                >

                                <Transition
                                    enter-from-class="opacity-0"
                                    leave-to-class="opacity-0"
                                    class="transition ease-in-out"
                                >
                                    <p
                                        v-if="form.recentlySuccessful"
                                        class="text-sm text-gray-600"
                                    >
                                        更新しました
                                    </p>
                                </Transition>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </AuthenticatedLayout>
</template>
