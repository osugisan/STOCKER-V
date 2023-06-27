<script setup></script>

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
                        タグ追加
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
                                <div class="relative z-0 mt-1 mb-3">
                                    <input
                                        type="text"
                                        id="tag_name"
                                        class="text-lg text-gray-900 px-0 w-full bg-transparent border-b-2 border-gray-400 border-0 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-gray-400 peer"
                                        placeholder="グループ名を入力"
                                    />
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none"
                                    >
                                        <svg
                                            class="w-4 h-4 text-gray-600 dark:text-gray-400"
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
                                <div
                                    class="flex items-center rounded hover:bg-gray-100 dark:hover:bg-gray-600"
                                >
                                    <input
                                        id="checkbox-item-11"
                                        type="checkbox"
                                        value=""
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
                                        type="button"
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
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>
