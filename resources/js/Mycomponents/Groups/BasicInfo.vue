<script setup>
import TagList from "@/Mycomponents/TagList.vue";
import Message from "@/Mycomponents/Message.vue";
import { router, useForm } from "@inertiajs/vue3";
import { ref, watch } from "vue";

const props = defineProps({
    group: Object,
    user: Object,
    current_group: Object,
});

watch(
    () => props.current_group,
    () => {
        form.name = props.current_group.name;
    }
);

const form = useForm({
    name: props.current_group.name,
});

const changeMainGroup = (id) => {
    router.put(route("groups.user-update", id), { type: "change" });
};

const updateGroup = (id) => {
    form.patch(route("groups.update", id));
};
</script>

<template>
    <div class="p-2 mx-auto lg:w-2/3">
        <div
            class="bg-white bg-opacity-90 px-4 py-4 rounded-lg overflow-hidden shadow-lg"
        >
            <div class="font-medium">
                <p>グループ基本情報</p>
            </div>

            <div class="relative z-0">
                <input
                    v-model="form.name"
                    @change="updateGroup(props.current_group.id)"
                    type="text"
                    id="floating_standard"
                    class="title-font sm:text-2xl text-xl font-medium text-gray-900 mt-2 px-0 w-full bg-transparent border-b-2 border-transparent border-0 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-gray-400 peer"
                    placeholder="グループ名を入力"
                />
                <div
                    class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none"
                >
                    <svg
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true"
                        class="w-5 h-5 text-gray-600 dark:text-gray-400"
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

            <Message :form="form" />

            <p class="border-b pb-2">
                グループID：
                <span class="ml-2">{{ props.current_group.code }}</span>
            </p>

            <button
                data-modal-target="group-id"
                data-modal-toggle="group-id"
                type="button"
                class="flex my-5"
            >
                <svg
                    class="w-6 mr-2"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                >
                    <path
                        clip-rule="evenodd"
                        fill-rule="evenodd"
                        d="M5.5 3A2.5 2.5 0 003 5.5v2.879a2.5 2.5 0 00.732 1.767l6.5 6.5a2.5 2.5 0 003.536 0l2.878-2.878a2.5 2.5 0 000-3.536l-6.5-6.5A2.5 2.5 0 008.38 3H5.5zM6 7a1 1 0 100-2 1 1 0 000 2z"
                    ></path>
                </svg>
                <p class="inline-block font-title font-bold">タグを編集する</p>
            </button>

            <TagList
                buttonIsActive="true"
                modalTitle="タグ編集"
                modalId="group-id"
            />

            <div class="flex justify-center pt-4 border-t">
                <button
                    v-if="props.user.main_group !== props.current_group.id"
                    @click="changeMainGroup(props.current_group.id)"
                    type="button"
                    class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900"
                >
                    メインのグループに設定する
                </button>
            </div>
        </div>
    </div>
</template>
