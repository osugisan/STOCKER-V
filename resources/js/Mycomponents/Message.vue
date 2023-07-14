<script setup>
defineProps({
    form: Object,
});
</script>

<template>
    <div class="fixed z-40 top-3 h-12 max-w-sm rounded-lg bottom-4 right-0">
        <Transition
            enter-from-class="opacity-0"
            leave-to-class="opacity-0"
            class="transition ease-in-out"
        >
            <div
                v-show="form.recentlySuccessful"
                class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                role="alert"
            >
                <svg
                    class="flex-shrink-0 inline w-4 h-4 mr-1.5"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 20 20"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="m7 10 2 2 4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                    />
                </svg>
                <div>
                    <span class="font-medium">登録しました</span>
                </div>
            </div>
        </Transition>
    </div>
</template>
