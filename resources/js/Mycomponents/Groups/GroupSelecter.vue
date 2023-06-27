<script setup></script>

<template>
    <div class="p-2 text-center mx-auto lg:w-2/3">
        <button
            id="dropdownDefaultButton"
            data-dropdown-toggle="dropdown"
            class="w-2/3 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 font-medium rounded-lg text-lg px-4 py-2.5 text-center inline-flex items-center shadow-lg"
            type="button"
        >
            グループ1【メイン】
            <svg
                class="w-4 h-4 ml-auto"
                aria-hidden="true"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M19 9l-7 7-7-7"
                ></path>
            </svg>
        </button>
        <!-- ドロップダウンメニュー -->
        <div
            id="dropdown"
            class="w-1/2 z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg dark:bg-gray-700"
        >
            <ul
                class="py-2 font-medium text-gray-700 dark:text-gray-200"
                aria-labelledby="dropdownDefaultButton"
            >
                <li>
                    <a
                        href="#"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                        >サブグループ</a
                    >
                </li>
                <li class="border-t">
                    <button
                        data-modal-target="group-modal"
                        data-modal-toggle="group-modal"
                        type="button"
                        class="px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                    >
                        グループを追加
                    </button>
                </li>
            </ul>
        </div>
    </div>
</template>
