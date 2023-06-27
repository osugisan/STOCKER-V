<script setup>
import TagList from "@/Mycomponents/TagList.vue";
</script>

<template>
    <!-- アイテム詳細情報 -->
    <div
        class="bg-white bg-opacity-90 mt-5 px-4 py-4 rounded-lg overflow-hidden shadow-lg"
    >
        <div class="grid grid-cols-12">
            <p class="col-span-11 inline-block font-title font-bold mb-2">
                タグ
            </p>

            <TagList
                modalTitle="タグ選択"
                :iconIsActive="true"
                :inputIsActive="true"
                modalId="tag-id"
            />
        </div>
        <span
            class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300"
            >Default</span
        >

        <label for="message" class="block mt-4 mb-2 font-title font-bold"
            >メモ</label
        >
        <textarea
            id="message"
            rows="4"
            class="block p-2.5 mb-4 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="メモを入力..."
        ></textarea>

        <p class="col-span-11 inline-block font-title font-bold">基準在庫数</p>
        <p class="mb-4 text-xs">
            基準在庫数を下回ると「不足しているアイテム」リストに追加されます
        </p>
        <div
            class="grid grid-cols-3 mx-auto py-auto w-2/3 sm:w-2/5 bg-gray-300 border rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700"
        >
            <button class="mx-auto my-auto">
                <svg
                    class="w-10 rounded-full hover:bg-gray-400"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                >
                    <path
                        clip-rule="evenodd"
                        fill-rule="evenodd"
                        d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z"
                    ></path>
                </svg>
            </button>
            <input
                type="number"
                value="0"
                class="border-none text-center hover:text-black text-4xl font-bold tracking-tight bg-gray-300 text-gray-600 dark:text-white"
            />
            <button class="mx-auto my-auto">
                <svg
                    class="w-10 rounded-full hover:bg-gray-400"
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
        </div>
    </div>
</template>
