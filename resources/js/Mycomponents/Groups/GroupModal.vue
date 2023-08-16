<script setup>
import SuccessMessage from "@/Mycomponents/SuccessMessage.vue";
import InputError from "@/Components/InputError.vue";
import { useForm } from "@inertiajs/vue3";
import { Modal } from "flowbite";

const $targetEl = document.getElementById("group-modal");

const modal = new Modal($targetEl);

const testClick = () => {
    modal.toggle();
};

const message = "登録しました";

const form = useForm({
    name: "",
    main_group: false,
});

const storeGroup = () => {
    form.post(route("groups.store"), {
        onSuccess: () => {
            form.reset();
        },
    });
};

const formReset = () => {
    form.reset();
};

defineExpose({
    formReset,
});
</script>

<template>
    <div
        id="group-modal"
        tabindex="-1"
        class="fixed z-60 top-0 left-0 right-0 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full"
    >
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-center py-2 px-10 border-b rounded-t dark:border-gray-600"
                >
                    <h3
                        class="text-xl font-medium text-gray-900 dark:text-white"
                    >
                        グループ追加
                    </h3>
                    <button
                        type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="group-modal"
                    >
                        <svg
                            aria-hidden="true"
                            class="w-5 h-5"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="px-4 space-y-6">
                    <ul
                        class="text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="dropdownDividerButton"
                    >
                        <li>
                            <div class="block w-full px-4 py-2 text-gray-800">
                                <form @submit.prevent="storeGroup">
                                    <div class="relative z-0 mt-1 mb-3">
                                        <input
                                            v-model="form.name"
                                            type="text"
                                            id="tag_name"
                                            class="text-lg text-gray-900 px-0 w-full bg-transparent border-b-2 border-gray-400 border-0 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-gray-400 peer"
                                            placeholder="グループ名を入力"
                                        />

                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.name"
                                        />
                                    </div>
                                    <div
                                        class="flex items-center rounded hover:bg-gray-100 dark:hover:bg-gray-600"
                                    >
                                        <input
                                            v-model="form.main_group"
                                            id="checkbox-item-11"
                                            type="checkbox"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                        />
                                        <label
                                            for="checkbox-item-11"
                                            class="py-2 ml-2 text-md font-medium text-gray-900 rounded dark:text-gray-300"
                                            >メインのグループに設定</label
                                        >
                                    </div>
                                    <div
                                        class="flex items-center justify-end pb-6 pt-2 left-0 space-x-2 rounded-b dark:border-gray-600"
                                    >
                                        <button
                                            data-modal-hide="group-modal"
                                            type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        >
                                            決定
                                        </button>
                                        <button
                                            data-modal-hide="group-modal"
                                            type="button"
                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                                        >
                                            キャンセル
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <SuccessMessage :form="form" :message="message" />
</template>
