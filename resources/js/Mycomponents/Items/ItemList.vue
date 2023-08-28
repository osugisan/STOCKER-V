<script setup>
import { Link, router } from "@inertiajs/vue3";
import { computed } from "vue";

const props = defineProps({
    items: Array,
    user: Object,
});

computed;

const load = () => {
    console.log(load);
};

const unload = () => {
    console.log(unload);
};
</script>

<template>
    <!-- カード -->
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-wrap -m-4">
                <!-- カード大 -->
                <div
                    v-for="item in props.items"
                    :key="item.id"
                    class="p-2 lg:w-1/3"
                >
                    <div
                        v-show="props.user.large_item === 1"
                        class="grid grid-cols-12 bg-white bg-opacity-90 px-4 py-4 rounded-lg overflow-hidden shadow-lg"
                    >
                        <Link href="items/show" class="col-span-9">
                            <h1
                                class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-1"
                            >
                                {{ item.name }}
                            </h1>
                            <p class="leading-relaxed inline-flex">在庫数：</p>
                            <h1
                                class="inline-flex title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3"
                            >
                                {{ item.qty }}
                            </h1>
                            <p class="leading-relaxed inline-flex">
                                / {{ item.basic_stock }}
                            </p>
                            <p class="leading-relaxed pb-3">
                                {{ item.memo }}
                            </p>
                            <span
                                v-for="tag in item.tags"
                                :key="tag.id"
                                :class="`bg-${tag.bg_color} text-${tag.text_color}`"
                                class="text-sm font-medium mr-2 px-2.5 py-0.5 mb-3 rounded-full dark:bg-blue-900 dark:text-blue-300"
                                >{{ tag.name }}</span
                            >
                        </Link>

                        <div class="col-span-3 pb-3">
                            <img
                                class="h-auto max-w-full rounded-lg"
                                src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg"
                                alt=""
                            />
                        </div>

                        <span
                            class="col-span-12 border-b border-gray-200 dark:border-gray-700 my-3"
                        ></span>

                        <div class="col-span-10 my-auto">
                            <button
                                @click="unload()"
                                class="text-red-500 inline-flex items-center mx-4"
                            >
                                一つ取り出す
                            </button>

                            <button
                                @click="load()"
                                class="text-indigo-500 inline-flex items-center"
                            >
                                一つ追加する
                            </button>
                        </div>

                        <div class="col-span-2">
                            <div
                                class="leading-none flex justify-end bottom-0 left-0"
                            >
                                <button
                                    id="threedotsButton"
                                    data-dropdown-toggle="dropdownThreedots"
                                    class="inline-block text-gray-400 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                                    type="button"
                                >
                                    <span class="sr-only">Open dropdown</span>
                                    <svg
                                        class="w-6 h-6"
                                        aria-hidden="true"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"
                                        ></path>
                                    </svg>
                                </button>
                                <!-- Dropdown menu -->
                                <div
                                    id="dropdownThreedots"
                                    class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700"
                                >
                                    <ul
                                        class="py-2"
                                        aria-labelledby="threedotsButton"
                                    >
                                        <li>
                                            <a
                                                href="#"
                                                class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                                >アイテムを削除する</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- カード大 -->

                <!-- カード小 -->
                <div
                    v-for="item in props.items"
                    :key="item.id"
                    class="p-2 lg:w-1/3"
                >
                    <div
                        v-show="props.user.large_item === 0"
                        class="grid grid-cols-12 bg-white bg-opacity-90 p-2 rounded-lg overflow-hidden shadow-lg"
                    >
                        <div class="col-span-2 my-auto">
                            <img
                                class="rounded-lg"
                                src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg"
                                alt=""
                            />
                        </div>

                        <div class="col-span-7 p-1">
                            <div class="grid grid-cols-12">
                                <div class="col-span-12">
                                    <h1
                                        class="title-font sm:text-lg text-lg font-medium text-gray-900 mb-1"
                                    >
                                        {{ item.name }}
                                    </h1>
                                </div>
                                <div class="col-span-3 ml-auto my-auto">
                                    <h1
                                        class="inline-flex title-font sm:text-lg text-lg font-medium text-gray-900"
                                    >
                                        {{ item.qty }}
                                    </h1>
                                    <p class="leading-relaxed inline-flex">
                                        / {{ item.basic_stock }}
                                    </p>
                                </div>
                                <div class="col-span-9 ml-auto my-auto">
                                    <span
                                        v-for="tag in item.tags"
                                        :key="tag.id"
                                        :class="`bg-${tag.bg_color} text-${tag.text_color}`"
                                        class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"
                                        >{{ tag.name.slice(0, 1) }}</span
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="col-span-3 my-auto">
                            <button @click="unload()">
                                <svg
                                    class="inline-flex w-10 text-red-500"
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
                                        d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                                    ></path>
                                </svg>
                            </button>
                            <button @click="load()">
                                <svg
                                    class="inline-flex w-10"
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
                                        d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                                    ></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- カード小 -->
            </div>
        </div>
    </section>
</template>
