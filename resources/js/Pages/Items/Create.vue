<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ItemHistory from "@/Mycomponents/ItemHistory.vue";
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
    imagePath: String,
});

const returnURL = "items.index";
</script>

<template>
    <Head title="アイテム登録" />

    <AuthenticatedLayout>
        <ReturnButton :returnURL="returnURL" />

        <section class="text-gray-600 body-font">
            <div class="container md:px-5 py-8 mx-auto">
                <div class="p-2 mx-auto lg:w-2/3 custom-number-input">

                    <BasicInfo :imagePath="imagePath" />

                    <DetailInfo />

                    <div
                        class="text-center text-white mx-auto mt-4 py-3 w-2/3 sm:w-2/5 p-1 bg-emerald-500 hover:bg-emerald-600 rounded-lg shadow"
                    >
                        <button class="mx-auto my-auto text-lg font-medium">
                            アイテムを登録する
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </AuthenticatedLayout>
</template>

<style>
  input[type='number']::-webkit-inner-spin-button,
  input[type='number']::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  .custom-number-input input:focus {
    outline: none !important;
  }

  .custom-number-input button:focus {
    outline: none !important;
  }
</style>