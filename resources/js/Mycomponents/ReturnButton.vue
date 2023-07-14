<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    returnURL: String,
});
</script>

<template>
    <!-- ヘッダーボタン -->
    <div
        class="fixed z-40 top-3 h-12 max-w-sm bg-white border border-gray-200 rounded-lg bottom-4 left-3 hover:rounded-lg dark:bg-gray-700 dark:border-gray-600 shadow-lg shadow-gray-400"
    >
        <Link
            as="button"
            :href="route(returnURL)"
            class="block my-auto px-3 py-1.5 rounded-l-full hover:bg-gray-50 dark:hover:bg-gray-800 group"
        >
            <svg
                class="w-8 h-8 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true"
            >
                <path
                    clip-rule="evenodd"
                    fill-rule="evenodd"
                    d="M7.793 2.232a.75.75 0 01-.025 1.06L3.622 7.25h10.003a5.375 5.375 0 010 10.75H10.75a.75.75 0 010-1.5h2.875a3.875 3.875 0 000-7.75H3.622l4.146 3.957a.75.75 0 01-1.036 1.085l-5.5-5.25a.75.75 0 010-1.085l5.5-5.25a.75.75 0 011.06.025z"
                ></path>
            </svg>
        </Link>
    </div>
</template>
