<script setup>
defineProps({
    changed: Boolean,
});
</script>

<template>
    <div
        class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none"
    >
        <button v-if="!changed" type="button">
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
            v-if="changed"
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
</template>
