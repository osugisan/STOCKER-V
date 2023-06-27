<script setup>
defineProps({
    imagePath: [Object, String],
});
</script>

<template>
    <!-- アイテム基本情報 -->
    <div
        class="bg-white bg-opacity-90 px-4 py-4 rounded-lg overflow-hidden shadow-lg"
    >
        <img class="rounded mx-auto" :src="imagePath" width="100" />
        <div>
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
        </div>

        <div class="relative z-0">
            <input
                type="text"
                id="floating_standard"
                class="text-center title-font sm:text-2xl text-xl font-medium text-gray-900 my-2 py-2.5 px-0 w-full bg-transparent border-b-2 border-transparent border-0 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-gray-400 peer"
                placeholder="アイテム名を入力"
            />
            <div
                class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none"
            >
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
            </div>
        </div>

        <div class="flex justify-center items-center mb-5">
            <span class="text-xl font-title text-gray-700">現在庫数</span>
            <span class="text-4xl text-gray-700 font-bold mx-8">3</span>
        </div>

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
        <p class="text-center mt-4">更新日時 23:10</p>
    </div>
</template>
