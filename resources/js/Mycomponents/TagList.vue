<script setup>
import { Link, useForm } from "@inertiajs/vue3";
import { reactive } from "vue";

const props = defineProps({
    modalTitle: String,
    iconIsActive: Boolean,
    buttonIsActive: Boolean,
    inputIsActive: Boolean,
    modalId: String,
    tags: Array,
});

const temp = reactive({
    bg_color: "gray-200",
    text_color: "gray-600",
});

const setTempTag = (bg_color, text_color) => {
    temp.bg_color = bg_color;
    temp.text_color = text_color;
};

const tempToForm = () => {
    form.bg_color = temp.bg_color;
    form.text_color = temp.text_color;
};

const resetColor = () => {
    temp.bg_color = "gray-200";
    temp.text_color = "gray-600";
};

const setTagForm = (tag) => {
    form.id = tag.id;
    form.name = tag.name;
    form.bg_color = tag.bg_color;
    form.text_color = tag.text_color;
};

const form = useForm({
    id: "",
    name: "",
    bg_color: "",
    text_color: "",
});

const updateTag = (id) => {
    form.patch(route("tags.update", id));
};

const deleteTag = (id) => {
    router.delete(route('tags.destroy', id), {
        onBefore: () => confirm('このタグを削除しますか？')
    })
}
</script>

<template>
    <button
        v-show="props.iconIsActive"
        :data-modal-target="props.modalId"
        :data-modal-toggle="props.modalId"
        type="button"
    >
        <svg
            class="mx-auto w-5 h-5 text-gray-600 dark:text-gray-400"
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

    <!-- タグ一覧 -->
    <div
        :id="props.modalId"
        tabindex="-1"
        class="fixed z-50 top-0 left-0 right-0 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full"
    >
        <div class="relative w-full max-w-sm max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-center py-2 px-5 border-b rounded-t dark:border-gray-600"
                >
                    <h3
                        class="text-xl font-medium text-gray-900 dark:text-white"
                    >
                        {{ props.modalTitle }}
                    </h3>

                    <!-- タグ新規登録ボタン -->
                    <button
                        data-modal-target="tag-edit"
                        data-modal-toggle="tag-edit"
                        type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    >
                        <svg
                            class="w-10"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true"
                        >
                            <path
                                d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z"
                            ></path>
                        </svg>
                    </button>
                    <!-- タグ新規登録ボタン -->
                </div>

                <!-- タグ一覧 -->
                <ul
                    class="h-48 px-1 pb-1 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
                    aria-labelledby="dropdownSearchButton"
                >
                    <li v-for="tag in tags" :key="tag.id">
                        <div
                            class="grid grid-cols-12 pl-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600"
                        >
                            <!-- タグ削除ボタン -->
                            <button
                                @click="deleteTag(tag.id)"
                                class="col-span-1 w-7 text-red-500"
                            >
                                <svg
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg"
                                    aria-hidden="true"
                                >
                                    <path
                                        clip-rule="evenodd"
                                        fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM6.75 9.25a.75.75 0 000 1.5h6.5a.75.75 0 000-1.5h-6.5z"
                                    ></path>
                                </svg>
                            </button>

                            <span
                                :class="`bg-${tag.bg_color}`"
                                class="col-span-1 my-2 w-5 ml-auto rounded-full"
                            ></span>
                            <!-- タグアイテム -->
                            <button
                                v-show="props.buttonIsActive"
                                @click="setTagForm(tag)"
                                data-modal-target="tag-edit"
                                data-modal-toggle="tag-edit"
                                type="button"
                                for="checkbox-item-11"
                                class="col-start-4 col-span-7 text-left w-full mr-auto py-2 text-lg font-bold text-gray-900 rounded dark:text-gray-300"
                            >
                                {{ tag.name }}
                            </button>

                            <!-- アイテム設定 -->
                            <label
                                v-show="props.inputIsActive"
                                for="checkbox-item-11"
                                class="col-start-4 col-span-7 w-full py-2 text-lg sm:text-lg font-bold text-gray-900 rounded dark:text-gray-300"
                            >
                                {{ tag.name }}
                            </label>
                            <input
                                v-show="props.inputIsActive"
                                id="checkbox-item-11"
                                type="checkbox"
                                value=""
                                class="col-span-1 w-6 h-6 my-auto text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                            />
                        </div>
                    </li>
                </ul>
                <!-- Modal footer -->
                <div
                    class="flex items-center justify-end px-6 pb-6 left-0 space-x-2 rounded-b dark:border-gray-600"
                >
                    <button
                        :data-modal-hide="props.modalId"
                        type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    >
                        決定
                    </button>
                    <button
                        :data-modal-hide="props.modalId"
                        type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                    >
                        キャンセル
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- タグ追加 -->
    <div
        id="tag-edit"
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
                        タグ編集
                    </h3>
                    <button
                        type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="tag-edit"
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
                                <form @submit.prevent="updateTag(form.id)">
                                    <div class="relative z-0 mt-1 mb-3">
                                        <label for="tag_name" class="text-lg"
                                            >タグ名</label
                                        >
                                        <input
                                            v-model="form.name"
                                            type="text"
                                            id="tag_name"
                                            class="text-lg text-gray-900 px-0 w-full bg-transparent border-b-2 border-gray-400 border-0 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-gray-400 peer"
                                            placeholder="タグ名を入力"
                                        />
                                    </div>
                                    <p class="text-lg">背景色</p>
                                    <button
                                        data-modal-target="color-edit"
                                        data-modal-toggle="color-edit"
                                        :class="`bg-${
                                            form.bg_color
                                                ? form.bg_color
                                                : temp.bg_color
                                        }`"
                                        class="block mx-auto my-3 py-auto w-2/3 sm:w-2/5 p-1 bg-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700"
                                    >
                                        <h5
                                            :class="`text-${
                                                form.text_color
                                                    ? form.text_color
                                                    : temp.text_color
                                            }`"
                                            class="mx-auto text-lg text-center font-bold tracking-tight text-gray-600 dark:text-white"
                                        >
                                            色を選択
                                        </h5>
                                    </button>
                                    <div
                                        class="flex items-center justify-end px-6 pb-6 left-0 space-x-2 rounded-b dark:border-gray-600"
                                    >
                                        <button
                                            data-modal-hide="tag-edit"
                                            type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        >
                                            決定
                                        </button>
                                        <button
                                            data-modal-hide="tag-edit"
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

    <!-- 背景色選択 -->
    <div
        id="color-edit"
        tabindex="-1"
        class="fixed z-70 top-0 left-0 right-0 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full"
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
                        背景色選択
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="px-4 space-y-6 mt-5">
                    <div class="block w-full h-auto px-4 py-2 text-gray-800">
                        <div class="flex justify-center">
                            <div class="flex items-baseline mx-auto mb-5">
                                <input
                                    id="color-1"
                                    type="radio"
                                    value="gray-200"
                                    @click="setTempTag('gray-200', 'gray-600')"
                                    class="hidden"
                                />
                                <label
                                    for="color-1"
                                    class="flex w-10 bg-gray-200 rounded-full"
                                >
                                    <svg
                                        v-if="temp.bg_color !== 'gray-200'"
                                        class="text-transparent"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"
                                        ></path>
                                    </svg>
                                    <svg
                                        v-if="temp.bg_color === 'gray-200'"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                    >
                                        <path
                                            clip-rule="evenodd"
                                            fill-rule="evenodd"
                                            d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        ></path>
                                    </svg>
                                </label>
                            </div>
                            <div class="flex items-baseline mx-auto mb-5">
                                <input
                                    id="color-2"
                                    type="radio"
                                    value="gray-700"
                                    @click="setTempTag('gray-700', 'white')"
                                    class="hidden"
                                />
                                <label
                                    for="color-2"
                                    class="flex w-10 bg-gray-700 rounded-full"
                                >
                                    <svg
                                        v-if="temp.bg_color !== 'gray-700'"
                                        class="text-transparent"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"
                                        ></path>
                                    </svg>
                                    <svg
                                        v-if="temp.bg_color === 'gray-700'"
                                        class="text-white"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                    >
                                        <path
                                            clip-rule="evenodd"
                                            fill-rule="evenodd"
                                            d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        ></path>
                                    </svg>
                                </label>
                            </div>
                            <div class="flex items-baseline mx-auto mb-5">
                                <input
                                    id="color-3"
                                    type="radio"
                                    value="red-500"
                                    @click="setTempTag('red-500', 'white')"
                                    class="hidden"
                                />
                                <label
                                    for="color-3"
                                    class="flex w-10 bg-red-500 rounded-full"
                                >
                                    <svg
                                        v-if="temp.bg_color !== 'red-500'"
                                        class="text-transparent"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"
                                        ></path>
                                    </svg>
                                    <svg
                                        v-if="temp.bg_color === 'red-500'"
                                        class="text-white"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                    >
                                        <path
                                            clip-rule="evenodd"
                                            fill-rule="evenodd"
                                            d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        ></path>
                                    </svg>
                                </label>
                            </div>
                            <div class="flex items-baseline mx-auto mb-5">
                                <input
                                    id="color-4"
                                    type="radio"
                                    value="yellow-200"
                                    @click="
                                        setTempTag('yellow-200', 'gray-600')
                                    "
                                    class="hidden"
                                />
                                <label
                                    for="color-4"
                                    class="flex w-10 bg-yellow-200 rounded-full"
                                >
                                    <svg
                                        v-if="temp.bg_color !== 'yellow-200'"
                                        class="text-transparent"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"
                                        ></path>
                                    </svg>
                                    <svg
                                        v-if="temp.bg_color === 'yellow-200'"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                    >
                                        <path
                                            clip-rule="evenodd"
                                            fill-rule="evenodd"
                                            d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        ></path>
                                    </svg>
                                </label>
                            </div>
                        </div>

                        <div class="flex justify-center">
                            <div class="flex items-baseline mx-auto mb-5">
                                <input
                                    id="color-5"
                                    type="radio"
                                    value="yellow-800"
                                    @click="setTempTag('yellow-800', 'white')"
                                    class="hidden"
                                />
                                <label
                                    for="color-5"
                                    class="flex w-10 bg-yellow-800 rounded-full"
                                >
                                    <svg
                                        v-if="temp.bg_color !== 'yellow-800'"
                                        class="text-transparent"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"
                                        ></path>
                                    </svg>
                                    <svg
                                        v-if="temp.bg_color === 'yellow-800'"
                                        class="text-white"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                    >
                                        <path
                                            clip-rule="evenodd"
                                            fill-rule="evenodd"
                                            d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        ></path>
                                    </svg>
                                </label>
                            </div>
                            <div class="flex items-baseline mx-auto mb-5">
                                <input
                                    id="color-6"
                                    type="radio"
                                    value="green-300"
                                    @click="setTempTag('green-300', 'gray-600')"
                                    class="hidden"
                                />
                                <label
                                    for="color-6"
                                    class="flex w-10 bg-green-300 rounded-full"
                                >
                                    <svg
                                        v-if="temp.bg_color !== 'green-300'"
                                        class="text-transparent"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"
                                        ></path>
                                    </svg>
                                    <svg
                                        v-if="temp.bg_color === 'green-300'"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                    >
                                        <path
                                            clip-rule="evenodd"
                                            fill-rule="evenodd"
                                            d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        ></path>
                                    </svg>
                                </label>
                            </div>
                            <div class="flex items-baseline mx-auto mb-5">
                                <input
                                    id="color-7"
                                    type="radio"
                                    value="green-600"
                                    @click="setTempTag('green-600', 'white')"
                                    class="hidden"
                                />
                                <label
                                    for="color-7"
                                    class="flex w-10 bg-green-600 rounded-full"
                                >
                                    <svg
                                        v-if="temp.bg_color !== 'green-600'"
                                        class="text-transparent"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"
                                        ></path>
                                    </svg>
                                    <svg
                                        v-if="temp.bg_color === 'green-600'"
                                        class="text-white"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                    >
                                        <path
                                            clip-rule="evenodd"
                                            fill-rule="evenodd"
                                            d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        ></path>
                                    </svg>
                                </label>
                            </div>
                            <div class="flex items-baseline mx-auto mb-5">
                                <input
                                    id="color-8"
                                    type="radio"
                                    value="blue-400"
                                    @click="setTempTag('blue-400', 'white')"
                                    class="hidden"
                                />
                                <label
                                    for="color-8"
                                    class="flex w-10 bg-blue-400 rounded-full"
                                >
                                    <svg
                                        v-if="temp.bg_color !== 'blue-400'"
                                        class="text-transparent"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"
                                        ></path>
                                    </svg>
                                    <svg
                                        v-if="temp.bg_color === 'blue-400'"
                                        class="text-white"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                    >
                                        <path
                                            clip-rule="evenodd"
                                            fill-rule="evenodd"
                                            d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        ></path>
                                    </svg>
                                </label>
                            </div>
                        </div>

                        <div class="flex justify-center">
                            <div class="flex items-baseline mx-auto mb-5">
                                <input
                                    id="color-9"
                                    type="radio"
                                    value="indigo-600"
                                    @click="setTempTag('indigo-600', 'white')"
                                    class="hidden"
                                />
                                <label
                                    for="color-9"
                                    class="flex w-10 bg-indigo-600 rounded-full"
                                >
                                    <svg
                                        v-if="temp.bg_color !== 'indigo-600'"
                                        class="text-transparent"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"
                                        ></path>
                                    </svg>
                                    <svg
                                        v-if="temp.bg_color === 'indigo-600'"
                                        class="text-white"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                    >
                                        <path
                                            clip-rule="evenodd"
                                            fill-rule="evenodd"
                                            d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        ></path>
                                    </svg>
                                </label>
                            </div>
                            <div class="flex items-baseline mx-auto mb-5">
                                <input
                                    id="color-10"
                                    type="radio"
                                    value="purple-400"
                                    @click="
                                        setTempTag('purple-400', 'gray-600')
                                    "
                                    class="hidden"
                                />
                                <label
                                    for="color-10"
                                    class="flex w-10 bg-purple-400 rounded-full"
                                >
                                    <svg
                                        v-if="temp.bg_color !== 'purple-400'"
                                        class="text-transparent"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"
                                        ></path>
                                    </svg>
                                    <svg
                                        v-if="temp.bg_color === 'purple-400'"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                    >
                                        <path
                                            clip-rule="evenodd"
                                            fill-rule="evenodd"
                                            d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        ></path>
                                    </svg>
                                </label>
                            </div>
                            <div class="flex items-baseline mx-auto mb-5">
                                <input
                                    id="color-11"
                                    type="radio"
                                    value="pink-300"
                                    @click="setTempTag('pink-300', 'gray-600')"
                                    class="hidden"
                                />
                                <label
                                    for="color-11"
                                    class="flex w-10 bg-pink-300 rounded-full"
                                >
                                    <svg
                                        v-if="temp.bg_color !== 'pink-300'"
                                        class="text-transparent"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"
                                        ></path>
                                    </svg>
                                    <svg
                                        v-if="temp.bg_color === 'pink-300'"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                    >
                                        <path
                                            clip-rule="evenodd"
                                            fill-rule="evenodd"
                                            d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        ></path>
                                    </svg>
                                </label>
                            </div>
                            <div class="flex items-baseline mx-auto mb-5">
                                <input
                                    id="color-12"
                                    type="radio"
                                    value="pink-600"
                                    @click="setTempTag('pink-600', 'white')"
                                    class="hidden"
                                />
                                <label
                                    for="color-12"
                                    class="flex w-10 bg-pink-600 rounded-full"
                                >
                                    <svg
                                        v-if="temp.bg_color !== 'pink-600'"
                                        class="text-transparent"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"
                                        ></path>
                                    </svg>
                                    <svg
                                        v-if="temp.bg_color === 'pink-600'"
                                        class="text-white"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                    >
                                        <path
                                            clip-rule="evenodd"
                                            fill-rule="evenodd"
                                            d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        ></path>
                                    </svg>
                                </label>
                            </div>
                        </div>

                        <div
                            class="flex items-center justify-end py-5 left-0 space-x-2 rounded-b dark:border-gray-600"
                        >
                            <button
                                @click="tempToForm()"
                                data-modal-hide="color-edit"
                                type="button"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            >
                                決定
                            </button>
                            <button
                                @click="resetColor()"
                                data-modal-hide="color-edit"
                                type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                            >
                                キャンセル
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
