<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ItemHistory from "@/Mycomponents/Items/ItemHistory.vue";
import TagList from "@/Mycomponents/Groups/TagList.vue";
import ReturnButton from "@/Mycomponents/ReturnButton.vue";
import BasicInfo from "@/Mycomponents/Items/BasicInfo.vue";
import DetailInfo from "@/Mycomponents/Items/DetailInfo.vue";
import { Head, Link } from "@inertiajs/vue3";
import "flowbite";
import { initFlowbite } from "flowbite";
import { onMounted, reactive, ref } from "vue";

onMounted(() => {
    initFlowbite();
});

defineProps({
    imagePath: Object,
});

const returnURL = "items.index";
</script>

<template>
    <Head title="アイテム登録" />

    <AuthenticatedLayout>
        <ReturnButton :returnURL="returnURL" />

        <section class="text-gray-600 body-font">
            <div class="container md:px-5 py-8 mx-auto">
                <div class="p-2 mx-auto lg:w-2/3">

                    <BasicInfo :imagePath="imagePath" />

                    <ItemHistory />

                    <DetailInfo />

                    <button
                        type="button"
                        class="block mx-auto mt-4 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                    >
                        アイテムを削除する
                    </button>
                </div>
            </div>
        </section>
    </AuthenticatedLayout>
</template>
