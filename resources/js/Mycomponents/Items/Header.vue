<script setup></script>

<template>
    <!-- ヘッダーボタン -->
    <div
        class="fixed z-40 top-3 h-16 max-w-sm bg-white border border-gray-200 rounded-full bottom-4 right-3 hover:rounded-full dark:bg-gray-700 dark:border-gray-600 shadow-lg shadow-gray-400"
    >
        <div class="grid h-full max-w-sm grid-cols-2 mx-auto">
            <button
                data-modal-target="small-modal"
                data-modal-toggle="small-modal"
                type="button"
                class="inline-flex flex-col items-center justify-center px-5 rounded-l-full hover:bg-gray-50 dark:hover:bg-gray-800 group"
            >
                <svg
                    class="w-6 h-6 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
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
                        d="M3 7.5L7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5"
                    ></path>
                </svg>
            </button>

            <button
                id="dropdownSearchButton"
                data-dropdown-toggle="dropdownSearch"
                data-dropdown-placement="bottom"
                type="button"
                class="inline-flex flex-col items-center justify-center px-5 rounded-l-full hover:rounded-full hover:bg-gray-50 dark:hover:bg-gray-800 group"
            >
                <svg
                    class="w-6 h-6 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
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
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                    ></path>
                </svg>
            </button>

            <!-- ドロップダウン -->
            <div
                id="dropdownSearch"
                class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700"
            >
                <div class="p-3">
                    <label for="input-group-search" class="sr-only"
                        >Search</label
                    >
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                        >
                            <svg
                                class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </div>
                        <input
                            type="text"
                            id="input-group-search"
                            class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="アイテムを検索"
                        />
                    </div>
                </div>
                <ul
                    class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
                    aria-labelledby="dropdownSearchButton"
                >
                    <li>
                        <div
                            class="flex items-center pl-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600"
                        >
                            <input
                                id="checkbox-item-11"
                                type="checkbox"
                                value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                            />
                            <label
                                for="checkbox-item-11"
                                class="w-full py-2 ml-2 text-md font-medium text-gray-900 rounded dark:text-gray-300"
                                >タグ１</label
                            >
                        </div>
                    </li>
                </ul>
                <div
                    class="flex items-center px-6 pb-6 left-0 space-x-2 rounded-b dark:border-gray-600"
                >
                    <button
                        data-modal-hide="barcode-modal"
                        type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    >
                        決定
                    </button>
                </div>
            </div>
            <!-- ドロップダウン -->
        </div>
    </div>
    <!-- ヘッダーボタン -->
</template>
