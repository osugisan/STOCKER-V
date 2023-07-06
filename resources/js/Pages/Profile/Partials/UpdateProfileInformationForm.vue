<script setup>
import InputError from "@/Components/InputError.vue";
import { Link, useForm, usePage, router } from "@inertiajs/vue3";
import { onMounted, reactive } from "vue";

const props = defineProps({
    mustVerifyEmail: Boolean,
    status: String,
});

const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
    avatar_img: user.avatar_img,
});

let changed = reactive({
    name: false,
    email: false,
});

const updateProfile = () => {
    form.patch(route("profile.update"));
};

const logout = () => {
    router.post(route("logout"));
};

const nameChanged = () => {
    changed.name = !changed.name;
};

const emailChanged = () => {
    changed.email = !changed.email;
};
</script>

<template>
    <div
        class="bg-white bg-opacity-90 px-4 py-4 rounded-lg overflow-hidden shadow-lg"
    >
        <div class="grid grid-cols-12 border-b pb-4">
            <div class="col-span-3 flex items-center">
                <div>
                    <form @change="updateProfile">
                        <label for="avatar_img">
                            <img
                                v-if="!form.avatar_img"
                                class="rounded-full mx-auto"
                                src="/images/default-user.png"
                                width="120"
                            />
                            <img
                                v-if="form.avatar_img"
                                class="rounded-full mx-auto"
                                :src="`/images/${form.avatar_img}`"
                                width="100"
                            />
                            <svg
                                class="flex items-center mx-auto w-5 h-5 text-gray-600 dark:text-gray-400"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                            >
                                <path
                                    d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z"
                                ></path>
                                <path
                                    d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z"
                                ></path>
                            </svg>
                        </label>
                        <input
                            id="avatar_img"
                            type="file"
                            name="avatar_img"
                            @input="form.avatar_img = $event.target.files[0]"
                            class="hidden"
                        />
                    </form>
                </div>
            </div>

            <div class="col-span-9">
                <div class="relative z-0 pl-4 sm:pl-1">
                    <input
                        type="text"
                        @change="updateProfile"
                        @focus="nameChanged"
                        @blur="nameChanged"
                        v-model="form.name"
                        required
                        autocomplete="name"
                        id="floating_standard"
                        class="title-font sm:text-xl text-lg font-medium text-gray-900 my-2 py-2.5 px-0 w-full bg-transparent border-b-2 border-transparent border-0 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-gray-400 peer"
                        placeholder="ニックネームを入力"
                    />
                    <div
                        class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none"
                    >
                        <button v-if="!changed.name" type="button">
                            <svg
                                class="w-5 h-5 text-gray-600 dark:text-gray-400"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                            >
                                <path
                                    d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z"
                                ></path>
                                <path
                                    d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z"
                                ></path>
                            </svg>
                        </button>
                        <button
                            v-if="changed.name"
                            type="button"
                            class="pointer-events-auto rounded-full hover:bg-gray-300"
                        >
                            <svg
                                class="w-5 h-5 text-gray-600 dark:text-gray-400"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 16 12"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M1 5.917 5.724 10.5 15 1.5"
                                />
                            </svg>
                        </button>
                    </div>

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="relative z-0 pl-4 sm:pl-1">
                    <input
                        type="email"
                        @change="updateProfile"
                        @focus="emailChanged"
                        @blur="emailChanged"
                        v-model="form.email"
                        required
                        autocomplete="username"
                        class="title-font sm:text-xl text-lg font-medium text-gray-900 my-2 py-2.5 px-0 w-full bg-transparent border-b-2 border-transparent border-0 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-gray-400 peer"
                        placeholder="メールアドレスを入力"
                    />
                    <div
                        class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none"
                    >
                        <button v-if="!changed.email" type="button">
                            <svg
                                class="w-5 h-5 text-gray-600 dark:text-gray-400"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                            >
                                <path
                                    d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z"
                                ></path>
                                <path
                                    d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z"
                                ></path>
                            </svg>
                        </button>
                        <button
                            v-if="changed.email"
                            type="button"
                            class="pointer-events-auto rounded-full hover:bg-gray-300"
                        >
                            <svg
                                class="w-5 h-5 text-gray-600 dark:text-gray-400"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 16 12"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M1 5.917 5.724 10.5 15 1.5"
                                />
                            </svg>
                        </button>
                    </div>

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>
            </div>

            <div
                v-if="props.mustVerifyEmail && user.email_verified_at === null"
            >
                <p class="text-sm mt-2 text-gray-800">
                    Your email address is unverified.
                    <Link
                        :href="route('verification.send')"
                        method="post"
                        as="button"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Click here to re-send the verification email.
                    </Link>
                </p>

                <div
                    v-show="props.status === 'verification-link-sent'"
                    class="mt-2 font-medium text-sm text-green-600"
                >
                    A new verification link has been sent to your email address.
                </div>
            </div>

            <div class="col-start-8 col-span-3 flex items-center gap-4">
                <Transition
                    enter-from-class="opacity-0"
                    leave-to-class="opacity-0"
                    class="transition ease-in-out"
                >
                    <p
                        v-show="form.recentlySuccessful"
                        class="text-sm text-gray-600"
                    >
                        登録しました
                    </p>
                </Transition>
            </div>
        </div>
        <div class="flex justify-end">
            <button
                @click="logout"
                class="text-red-500 font-medium inline-flex mt-4 pr-2"
            >
                <svg
                    class="inline-flex w-5 pb-1"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                >
                    <path
                        clip-rule="evenodd"
                        fill-rule="evenodd"
                        d="M3 4.25A2.25 2.25 0 015.25 2h5.5A2.25 2.25 0 0113 4.25v2a.75.75 0 01-1.5 0v-2a.75.75 0 00-.75-.75h-5.5a.75.75 0 00-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 00.75-.75v-2a.75.75 0 011.5 0v2A2.25 2.25 0 0110.75 18h-5.5A2.25 2.25 0 013 15.75V4.25z"
                    ></path>
                    <path
                        clip-rule="evenodd"
                        fill-rule="evenodd"
                        d="M6 10a.75.75 0 01.75-.75h9.546l-1.048-.943a.75.75 0 111.004-1.114l2.5 2.25a.75.75 0 010 1.114l-2.5 2.25a.75.75 0 11-1.004-1.114l1.048-.943H6.75A.75.75 0 016 10z"
                    ></path>
                </svg>
                サインアウト
            </button>
        </div>
    </div>
</template>
